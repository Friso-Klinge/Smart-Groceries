package com.smartboodschappenlijstje.smartboodschappenlijstje_api.database;

import com.smartboodschappenlijstje.smartboodschappenlijstje_api.model.Supermarket;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class SupermarketDatabase
{
    public Connection createConnection()
    {
        try
        {
            Class.forName("com.mysql.cj.jdbc.Driver");

            return DriverManager.getConnection(
                    "jdbc:mysql://localhost:3306/smart_groceries",
                    "groceries_user",
                    "groceries_password"
            );
        }
        catch (ClassNotFoundException | SQLException exception)
        {
            throw new RuntimeException(exception);
        }
    }

    public List<Supermarket> getSupermarkets()
    {
        List<Supermarket> supermarkets = new ArrayList<>();

        try
        {
            ResultSet resultSet = createConnection()
                    .createStatement()
                    .executeQuery("SELECT * FROM supermarkets");

            while (resultSet.next())
            {
                supermarkets.add(
                        new Supermarket(
                                resultSet.getInt("id"),
                                resultSet.getString("name"),
                                resultSet.getString("logo_url")
                        )
                );
            }
        }
        catch (SQLException exception)
        {
            throw new RuntimeException(exception);
        }

        return supermarkets;
    }
}