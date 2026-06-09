package com.smartboodschappenlijstje.smartboodschappenlijstje_api;

import java.sql.*;

public class Check {
    public static void main(String[] args) {
        Connection connection = null;
        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
            connection = DriverManager.getConnection(
                    "jdbc:mysql://localhost:3306/testdb", "groceries_user", "groceries_password"
            );

            Statement statement = connection.createStatement();
            ResultSet resultSet = statement.executeQuery("SELECT * FROM designation");

            while (resultSet.next()) {
                int code = resultSet.getInt("code");
                String title = resultSet.getString("title").trim();
                System.out.println("Code: " + code + " | Title: " + title);
            }

            resultSet.close();
            statement.close();
            connection.close();
        } catch (Exception e) {
            System.out.println(e);
        }
    }
}
