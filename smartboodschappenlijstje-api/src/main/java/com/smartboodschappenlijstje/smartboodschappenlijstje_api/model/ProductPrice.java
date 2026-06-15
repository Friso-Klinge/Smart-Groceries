package com.smartboodschappenlijstje.smartboodschappenlijstje_api.model;

public class ProductPrice
{
    private int id;
    private int productId;
    private int supermarketId;
    private double price;

    public ProductPrice()
    {

    }

    public ProductPrice(int id, int productId, int supermarketId, double price)
    {
        this.id = id;
        this.productId = productId;
        this.supermarketId = supermarketId;
        this.price = price;
    }

    public int getId()
    {
        return id;
    }

    public void setId(int id)
    {
        this.id = id;
    }

    public int getProductId()
    {
        return productId;
    }

    public void setProductId(int productId)
    {
        this.productId = productId;
    }

    public int getSupermarketId()
    {
        return supermarketId;
    }

    public void setSupermarketId(int supermarketId)
    {
        this.supermarketId = supermarketId;
    }

    public double getPrice()
    {
        return price;
    }

    public void setPrice(double price)
    {
        this.price = price;
    }
}