package com.smartboodschappenlijstje.smartboodschappenlijstje_api.Fuel;

import java.util.List;

public class TankerKoenigResponse
{
    private boolean ok;
    private List<TankerKoenigStation> stations;

    public boolean isOk()
    {
        return ok;
    }

    public void setOk(boolean ok)
    {
        this.ok = ok;
    }

    public List<TankerKoenigStation> getStations()
    {
        return stations;
    }

    public void setStations(List<TankerKoenigStation> stations)
    {
        this.stations = stations;
    }
}