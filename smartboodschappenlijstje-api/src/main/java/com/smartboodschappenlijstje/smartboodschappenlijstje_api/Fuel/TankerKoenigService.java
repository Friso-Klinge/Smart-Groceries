package com.smartboodschappenlijstje.smartboodschappenlijstje_api.Fuel;

import org.springframework.beans.factory.annotation.Value;
import org.springframework.stereotype.Service;
import org.springframework.web.client.RestClient;

@Service
public class TankerKoenigService
{
    private final RestClient restClient;

    @Value("${tankerkoenig.api-key}")
    private String apiKey;

    public TankerKoenigService()
    {
        this.restClient = RestClient.create();
    }

    public TankerKoenigResponse findStations(double latitude,
                                             double longitude,
                                             double radius)
    {
        String url =
                "https://creativecommons.tankerkoenig.de/json/list.php" +
                        "?lat=" + latitude +
                        "&lng=" + longitude +
                        "&rad=" + radius +
                        "&sort=dist" +
                        "&type=all" +
                        "&apikey=" + apiKey;

        return restClient.get()
                .uri(url)
                .retrieve()
                .body(TankerKoenigResponse.class);
    }
}