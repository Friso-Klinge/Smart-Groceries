package com.smartboodschappenlijstje.smartboodschappenlijstje_api.controller;

import com.smartboodschappenlijstje.smartboodschappenlijstje_api.database.ProductDatabase;
import com.smartboodschappenlijstje.smartboodschappenlijstje_api.model.Product;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
public class ProductController
{
    private final ProductDatabase productDatabase =
            new ProductDatabase();

    @GetMapping("/products")
    public List<Product> getProducts()
    {
        return productDatabase.getProducts();
    }

    @GetMapping("/products/{id}")
    public Product getProduct(@PathVariable int id)
    {
        return productDatabase.getProduct(id);
    }

    @PostMapping("/products")
    public Product addProduct(@RequestBody Product product)
    {
        productDatabase.addProduct(product);

        return product;
    }

    @DeleteMapping("/products/{id}")
    public String deleteProduct(@PathVariable int id)
    {
        productDatabase.deleteProduct(id);

        return "Product removed";
    }
}