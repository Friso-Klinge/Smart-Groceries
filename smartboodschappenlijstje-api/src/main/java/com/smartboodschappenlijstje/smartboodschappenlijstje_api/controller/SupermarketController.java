package com.smartboodschappenlijstje.smartboodschappenlijstje_api.controller;

import com.smartboodschappenlijstje.smartboodschappenlijstje_api.database.SupermarketDatabase;
import com.smartboodschappenlijstje.smartboodschappenlijstje_api.model.Supermarket;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
public class SupermarketController
{
    private final SupermarketDatabase supermarketDatabase =
            new SupermarketDatabase();

    @GetMapping("/supermarkets")
    public List<Supermarket> getSupermarkets()
    {
        return supermarketDatabase.getSupermarkets();
    }
}