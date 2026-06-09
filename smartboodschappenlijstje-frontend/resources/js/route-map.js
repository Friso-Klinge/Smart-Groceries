import L from 'leaflet';
import 'leaflet/dist/leaflet.css';

const mapElement = document.getElementById('route-map');

let API_KEY = '';

async function loadApiKey() {
    const response = await fetch('/api/openroute-key');

    if (!response.ok) {
        throw new Error(`API key kon niet worden opgehaald: ${response.status}`);
    }

    const data = await response.json();

    API_KEY = data.key;
}

async function loadRoute(map, stops) {
    try {
        const coordinates = stops.map((stop) => [stop.lng, stop.lat]);

        const response = await fetch(
            'https://api.openrouteservice.org/v2/directions/driving-car/geojson',
            {
                method: 'POST',
                headers: {
                    Authorization: API_KEY,
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    coordinates: coordinates,
                }),
            }
        );

        if (!response.ok) {
            throw new Error(`Route kon niet worden opgehaald: ${response.status}`);
        }

        const data = await response.json();

        const distanceInMeters = data.features[0].properties.summary.distance;
        const durationInSeconds = data.features[0].properties.summary.duration;

        const distanceInKm = distanceInMeters / 1000;
        const durationInMinutes = Math.round(durationInSeconds / 60);

        document.getElementById('total-distance').textContent = `± ${distanceInKm.toFixed(1)} km`;
        document.getElementById('total-time').textContent = `± ${durationInMinutes} min`;

        const route = L.geoJSON(data, {
            style: {
                weight: 5,
            },
        }).addTo(map);

        map.fitBounds(route.getBounds());
    } catch (error) {
        console.error('Route fout:', error);
    }
}

function addMarkers(map, stops) {
    stops.forEach((stop) => {
        L.marker([stop.lat, stop.lng])
            .addTo(map)
            .bindPopup(stop.name);
    });
}

async function createRouteWithStartLocation(map, supermarketStops, startLocation) {
    await loadApiKey();

    const stops = [
        startLocation,
        ...supermarketStops,
    ];

    addMarkers(map, stops);
    loadRoute(map, stops);
}

if (mapElement) {
    const map = L.map('route-map').setView([52.6610, 6.7400], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors',
        maxZoom: 19,
    }).addTo(map);

    const supermarketStops = [
        {
            name: 'Lidl',
            lat: 52.6620,
            lng: 6.7450,
        },
        {
            name: 'Aldi',
            lat: 52.6650,
            lng: 6.7350,
        },
        {
            name: 'Jumbo',
            lat: 52.6580,
            lng: 6.7380,
        },
    ];

    navigator.geolocation.getCurrentPosition(
        async (position) => {
            const userLocation = {
                name: 'Jouw locatie',
                lat: position.coords.latitude,
                lng: position.coords.longitude,
            };

            createRouteWithStartLocation(map, supermarketStops, userLocation);
        },
        async (error) => {
            console.error('Locatie kon niet worden opgehaald:', error);

            const fallbackStart = {
                name: 'Start',
                lat: 52.6610,
                lng: 6.7400,
            };

            createRouteWithStartLocation(map, supermarketStops, fallbackStart);
        }
    );
}