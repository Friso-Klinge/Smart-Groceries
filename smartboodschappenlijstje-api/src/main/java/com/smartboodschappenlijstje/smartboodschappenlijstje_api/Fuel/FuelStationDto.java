package com.smartboodschappenlijstje.smartboodschappenlijstje_api.Fuel;

public class FuelStationDto
{
    private String id;
    private String name;
    private String brand;

    private String street;
    private String houseNumber;
    private Integer postCode;
    private String place;

    private Double latitude;
    private Double longitude;

    private Double diesel;
    private Double e5;
    private Double e10;

    private Boolean open;

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

    public Double getLatitude()
    {
        return this.latitude;
    }

    public void setLatitude(Double latitude)
    {
        this.latitude = latitude;
    }

    public Double getLongitude()
    {
        return this.longitude;
    }

    public void setLongitude(Double longitude)
    {
        this.longitude = longitude;
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

    public Boolean getOpen()
    {
        return this.open;
    }

    public void setOpen(Boolean open)
    {
        this.open = open;
    }
}