package com.smartboodschappenlijstje.smartboodschappenlijstje_api.controller;

import com.smartboodschappenlijstje.smartboodschappenlijstje_api.database.ProductPriceDatabase;
import com.smartboodschappenlijstje.smartboodschappenlijstje_api.model.ProductPrice;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
public class ProductPriceController
{
    private final ProductPriceDatabase productPriceDatabase =
            new ProductPriceDatabase();

    @GetMapping("/products/{productId}/prices")
    public List<ProductPrice> getPricesByProduct(@PathVariable int productId)
    {
        return productPriceDatabase.getPricesByProductId(productId);
    }
}