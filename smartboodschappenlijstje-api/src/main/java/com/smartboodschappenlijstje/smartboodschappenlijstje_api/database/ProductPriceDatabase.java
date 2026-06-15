package com.smartboodschappenlijstje.smartboodschappenlijstje_api.database;

import com.smartboodschappenlijstje.smartboodschappenlijstje_api.model.ProductPrice;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class ProductPriceDatabase
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

    public List<ProductPrice> getPricesByProductId(int productId)
    {
        List<ProductPrice> prices = new ArrayList<>();

        try
        {
            ResultSet resultSet = createConnection()
                    .createStatement()
                    .executeQuery(
                            "SELECT * FROM product_prices WHERE product_id = " + productId
                    );

            while (resultSet.next())
            {
                prices.add(
                        new ProductPrice(
                                resultSet.getInt("id"),
                                resultSet.getInt("product_id"),
                                resultSet.getInt("supermarket_id"),
                                resultSet.getDouble("price")
                        )
                );
            }
        }
        catch (SQLException exception)
        {
            throw new RuntimeException(exception);
        }

        return prices;
    }
}