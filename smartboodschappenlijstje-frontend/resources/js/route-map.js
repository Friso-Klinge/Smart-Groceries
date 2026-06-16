import L from 'leaflet';
import 'leaflet/dist/leaflet.css';

const mapElement = document.getElementById('route-map');

async function loadApiKey() {
    const response = await fetch('/api/openroute-key');

    if (!response.ok) {
        throw new Error(`API key kon niet worden opgehaald: ${response.status}`);
    }

    const { key } = await response.json();
    return key;
}

async function fetchRoute(stops, apiKey) {
    const response = await fetch(
        'https://api.openrouteservice.org/v2/directions/driving-car/geojson',
        {
            method: 'POST',
            headers: {
                Authorization: apiKey,
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                coordinates: stops.map((stop) => [stop.lng, stop.lat]),
            }),
        }
    );

    if (!response.ok) {
        throw new Error(`Route kon niet worden opgehaald: ${response.status}`);
    }

    return response.json();
}

function addMarkers(map, stops) {
    stops.forEach((stop, index) => {
        L.circleMarker([stop.lat, stop.lng], {
            radius: index === 0 || index === stops.length - 1 ? 8 : 11,
            color: '#4ade80',
            fillColor: index === 0 || index === stops.length - 1 ? '#f8fafc' : '#22c55e',
            fillOpacity: 1,
            weight: 3,
        })
            .addTo(map)
            .bindPopup(stop.name);
    });
}

function updateSegments(data) {
    const segments = data.features[0].properties.segments ?? [];

    segments.forEach((segment, index) => {
        const element = document.querySelector(`[data-segment="${index}"]`);

        if (element) {
            element.textContent = `≈ ${(segment.distance / 1000).toFixed(1)} km`;
        }
    });
}

async function renderRoute(map, stops) {
    try {
        const apiKey = await loadApiKey();
        const data = await fetchRoute(stops, apiKey);
        const summary = data.features[0].properties.summary;

        document.getElementById('total-distance').textContent = `≈ ${(summary.distance / 1000).toFixed(1)} km`;
        document.getElementById('total-time').textContent = `≈ ${Math.round(summary.duration / 60)} min`;

        const route = L.geoJSON(data, {
            style: {
                color: '#22c55e',
                weight: 5,
            },
        }).addTo(map);

        updateSegments(data);
        map.fitBounds(route.getBounds(), { padding: [28, 28] });
    } catch (error) {
        console.error('Route fout:', error);
        map.fitBounds(stops.map((stop) => [stop.lat, stop.lng]), { padding: [28, 28] });
    }
}

if (mapElement) {
    const supermarketStops = JSON.parse(mapElement.dataset.stops || '[]');
    const map = L.map(mapElement, { zoomControl: true }).setView([52.725, 6.48], 13);

    L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; OpenStreetMap contributors &copy; CARTO',
        maxZoom: 19,
    }).addTo(map);

    navigator.geolocation.getCurrentPosition(
        ({ coords }) => {
            const home = { name: 'Jouw locatie', lat: coords.latitude, lng: coords.longitude };
            const stops = [home, ...supermarketStops, home];
            addMarkers(map, stops);
            renderRoute(map, stops);
        },
        () => {
            const home = { name: 'Start', lat: 52.725, lng: 6.48 };
            const stops = [home, ...supermarketStops, home];
            addMarkers(map, stops);
            renderRoute(map, stops);
        }
    );
}
