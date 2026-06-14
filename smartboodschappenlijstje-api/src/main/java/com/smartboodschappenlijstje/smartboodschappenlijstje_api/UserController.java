package com.smartboodschappenlijstje.smartboodschappenlijstje_api;

import org.springframework.web.bind.annotation.*;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

@RestController
public class UserController {

    List<User> users = new ArrayList<>();
    int currentId = 1;

    @GetMapping("/users/{id}")
    public User getUser(@PathVariable int id) {
        UsersFromSQL();

        for (User user : users) {
            if (user.getId() == id) {
                return user;
            }
        }

        return null;
    }

    @GetMapping("/users")
    public List<User> getUsers() {
        UsersFromSQL();

        return users;
    }

    @PostMapping("/users")
    public User addUser(@RequestBody User user) {
        user.setId(currentId++);
        users.add(user);

        UserToSQL(user);

        return user;
    }

    @DeleteMapping("/users/{id}")
    public String deleteUser(@PathVariable int id) {
        users.removeIf(user -> user.getId() == id);

        try {
            createConnection().createStatement().execute("DELETE FROM `users` WHERE id = " + id);
        } catch (SQLException e) {
            throw new RuntimeException(e);
        }

        return "User removed";
    }

    public void UserToSQL(User user)
    {
        Connection sql = createConnection();

        try {
            sql.createStatement().execute(
                    "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('"
                            + user.getUsername() + "', '"
                            + user.getEmail() + "', '"
                            + user.getPassword() + "')"
            );
        } catch (SQLException e) {
            throw new RuntimeException(e);
        }
    }

    public void UsersFromSQL()
    {
        Connection sql = createConnection();
        List<Integer> takenIDs = new ArrayList<>();

        for (User user : users) {
            takenIDs.add(user.getId());
        }

        try {
            ResultSet resultSet = sql.createStatement().executeQuery("SELECT * FROM `users`");

            while (resultSet.next())
            {
                if (!takenIDs.contains(resultSet.getInt("id"))) {
                    users.add(new User(
                            resultSet.getInt("id"),
                            resultSet.getString("name"),
                            resultSet.getString("email"),
                            resultSet.getString("password")
                    ));
                }
            }
        } catch (SQLException e) {
            throw new RuntimeException(e);
        }
    }

    public Connection createConnection()
    {
        Connection connection;

        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
            connection = DriverManager.getConnection(
                    "jdbc:mysql://db:3306/smart_groceries",
                    "groceries_user",
                    "groceries_password"
            );
        } catch (ClassNotFoundException | SQLException exception) {
            throw new RuntimeException(exception);
        }

        return connection;
    }
}