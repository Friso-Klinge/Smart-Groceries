package com.smartboodschappenlijstje.smartboodschappenlijstje_api.model;

public class Supermarket
{
    private int id;
    private String name;
    private String logoUrl;

    public Supermarket()
    {

    }

    public Supermarket(int id, String name, String logoUrl)
    {
        this.id = id;
        this.name = name;
        this.logoUrl = logoUrl;
    }

    public int getId()
    {
        return id;
    }

    public void setId(int id)
    {
        this.id = id;
    }

    public String getName()
    {
        return name;
    }

    public void setName(String name)
    {
        this.name = name;
    }

    public String getLogoUrl()
    {
        return logoUrl;
    }

    public void setLogoUrl(String logoUrl)
    {
        this.logoUrl = logoUrl;
    }
}