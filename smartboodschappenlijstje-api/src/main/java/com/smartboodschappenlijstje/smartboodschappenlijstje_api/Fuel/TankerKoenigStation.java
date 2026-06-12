package com.smartboodschappenlijstje.smartboodschappenlijstje_api.Fuel;

public class TankerKoenigStation
{
    private String id;
    private String name;
    private String brand;

    private String street;
    private String houseNumber;
    private Integer postCode;
    private String place;

    private Double lat;
    private Double lng;

    private Double diesel;
    private Double e5;
    private Double e10;

    private Boolean isOpen;

    public String getId()
    {
        return this.id;
    }

    public void setId(String id)
    {
        this.id = id;
    }

    public String getName()
    {
        return this.name;
    }

    public void setName(String name)
    {
        this.name = name;
    }

    public String getBrand()
    {
        return this.brand;
    }

    public void setBrand(String brand)
    {
        this.brand = brand;
    }

    public String getStreet()
    {
        return this.street;
    }

    public void setStreet(String street)
    {
        this.street = street;
    }

    public String getHouseNumber()
    {
        return this.houseNumber;
    }

    public void setHouseNumber(String houseNumber)
    {
        this.houseNumber = houseNumber;
    }

    public Integer getPostCode()
    {
        return this.postCode;
    }

    public void setPostCode(Integer postCode)
    {
        this.postCode = postCode;
    }

    public String getPlace()
    {
        return this.place;
    }

    public void setPlace(String place)
    {
        this.place = place;
    }

    public Double getLat()
    {
        return this.lat;
    }

    public void setLat(Double lat)
    {
        this.lat = lat;
    }

    public Double getLng()
    {
        return this.lng;
    }

    public void setLng(Double lng)
    {
        this.lng = lng;
    }

    public Double getDiesel()
    {
        return this.diesel;
    }

    public void setDiesel(Double diesel)
    {
        this.diesel = diesel;
    }

    public Double getE5()
    {
        return this.e5;
    }

    public void setE5(Double e5)
    {
        this.e5 = e5;
    }

    public Double getE10()
    {
        return this.e10;
    }

    public void setE10(Double e10)
    {
        this.e10 = e10;
    }

    public Boolean getIsOpen()
    {
        return this.isOpen;
    }

    public void setIsOpen(Boolean isOpen)
    {
        this.isOpen = isOpen;
    }
}