package com.smartboodschappenlijstje.smartboodschappenlijstje_api.database;

import com.smartboodschappenlijstje.smartboodschappenlijstje_api.model.Product;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

public class ProductDatabase
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

    public List<Product> getProducts()
    {
        List<Product> products = new ArrayList<>();

        try
        {
            ResultSet resultSet = createConnection()
                    .createStatement()
                    .executeQuery("SELECT * FROM products");

            while (resultSet.next())
            {
                products.add(
                        new Product(
                                resultSet.getInt("id"),
                                resultSet.getString("barcode"),
                                resultSet.getString("name"),
                                resultSet.getString("brand"),
                                resultSet.getString("image_url")
                        )
                );
            }
        }
        catch (SQLException exception)
        {
            throw new RuntimeException(exception);
        }

        return products;
    }

    public Product getProduct(int id)
    {
        try
        {
            ResultSet resultSet = createConnection()
                    .createStatement()
                    .executeQuery(
                            "SELECT * FROM products WHERE id = " + id
                    );

            if (resultSet.next())
            {
                return new Product(
                        resultSet.getInt("id"),
                        resultSet.getString("barcode"),
                        resultSet.getString("name"),
                        resultSet.getString("brand"),
                        resultSet.getString("image_url")
                );
            }
        }
        catch (SQLException exception)
        {
            throw new RuntimeException(exception);
        }

        return null;
    }

    public void addProduct(Product product)
    {
        try
        {
            createConnection().createStatement().execute(
                    "INSERT INTO products (barcode, name, brand, image_url) VALUES ('"
                            + product.getBarcode() + "', '"
                            + product.getName() + "', '"
                            + product.getBrand() + "', '"
                            + product.getImageUrl() + "')"
            );
        }
        catch (SQLException exception)
        {
            throw new RuntimeException(exception);
        }
    }

    public void deleteProduct(int id)
    {
        try
        {
            createConnection().createStatement().execute(
                    "DELETE FROM products WHERE id = " + id
            );
        }
        catch (SQLException exception)
        {
            throw new RuntimeException(exception);
        }
    }
}