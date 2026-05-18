package com.smartboodschappenlijstje.smartboodschappenlijstje_api;

import org.springframework.web.bind.annotation.*;

import java.util.ArrayList;
import java.util.List;

@RestController
public class UserController {

    List<User> users = new ArrayList<>();
    int currentId = 1;

    @GetMapping("/users")
    public List<User> getUsers() {
        return users;
    }

    @PostMapping("/users")
    public User addUser(@RequestBody User user) {
        user.id = currentId++;
        users.add(user);
        return user;
    }
}