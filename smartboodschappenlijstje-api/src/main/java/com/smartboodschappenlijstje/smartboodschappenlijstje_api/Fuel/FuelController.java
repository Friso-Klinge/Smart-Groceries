package com.smartboodschappenlijstje.smartboodschappenlijstje_api.Fuel;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

import java.util.List;

@RestController
@RequestMapping("/api/fuel")
public class FuelController
{
    private final TankerKoenigService tankerKoenigService;

    public FuelController(TankerKoenigService tankerKoenigService)
    {
        this.tankerKoenigService = tankerKoenigService;
    }

    @GetMapping("/stations")
    public List<FuelStationDto> getStations(
            @RequestParam double latitude,
            @RequestParam double longitude)
    {
        return tankerKoenigService
                .findStations(latitude, longitude, 10)
                .getStations()
                .stream()
                .map(this::mapToDto)
                .toList();
    }

    private FuelStationDto mapToDto(TankerKoenigStation station)
    {
        FuelStationDto dto = new FuelStationDto();

        dto.setId(station.getId());
        dto.setName(station.getName());
        dto.setBrand(station.getBrand());

        dto.setStreet(station.getStreet());
        dto.setHouseNumber(station.getHouseNumber());
        dto.setPostCode(station.getPostCode());
        dto.setPlace(station.getPlace());

        dto.setLatitude(station.getLat());
        dto.setLongitude(station.getLng());

        dto.setDiesel(station.getDiesel());
        dto.setE5(station.getE5());
        dto.setE10(station.getE10());

        dto.setOpen(station.getIsOpen());

        return dto;
    }
}