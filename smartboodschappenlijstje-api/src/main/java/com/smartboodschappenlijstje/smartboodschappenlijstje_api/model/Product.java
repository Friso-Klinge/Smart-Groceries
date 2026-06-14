package com.smartboodschappenlijstje.smartboodschappenlijstje_api.model;

public class Product
{
    private int id;
    private String barcode;
    private String name;
    private String brand;
    private String imageUrl;

    public Product()
    {

    }

    public Product(int id, String barcode, String name, String brand, String imageUrl)
    {
        this.id = id;
        this.barcode = barcode;
        this.name = name;
        this.brand = brand;
        this.imageUrl = imageUrl;
    }

    public int getId()
    {
        return id;
    }

    public void setId(int id)
    {
        this.id = id;
    }

    public String getBarcode()
    {
        return barcode;
    }

    public void setBarcode(String barcode)
    {
        this.barcode = barcode;
    }

    public String getName()
    {
        return name;
    }

    public void setName(String name)
    {
        this.name = name;
    }

    public String getBrand()
    {
        return brand;
    }

    public void setBrand(String brand)
    {
        this.brand = brand;
    }

    public String getImageUrl()
    {
        return imageUrl;
    }

    public void setImageUrl(String imageUrl)
    {
        this.imageUrl = imageUrl;
    }
}