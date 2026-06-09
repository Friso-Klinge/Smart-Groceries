package com.smartboodschappenlijstje.smartboodschappenlijstje_api;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.boot.context.event.ApplicationReadyEvent;
import org.springframework.context.event.EventListener;

import java.sql.*;

@SpringBootApplication
public class SmartboodschappenlijstjeApiApplication
{
	public Connection sqlConnection = createConnection();

	public static void main(String[] args)
	{
		SpringApplication.run(SmartboodschappenlijstjeApiApplication.class, args);
	}

	@EventListener(ApplicationReadyEvent.class)
//	@Profile("dev")
	public void openSwagger()
	{
		new Thread(() -> {
			try {
				Thread.sleep(1500); // even wachten tot alles echt klaar is

				Runtime.getRuntime().exec(new String[]{
						"cmd", "/c", "start",
						"http://localhost:8080/swagger-ui/index.html"
				});

			} catch (Exception e) {
				e.printStackTrace();
			}
		}).start();
	}

	public Connection createConnection()
	{
		Connection connection;

		try {
			Class.forName("com.mysql.cj.jdbc.Driver");
			connection = DriverManager.getConnection(
					"jdbc:mysql://localhost:3306/Smart_Groceries", "groceries_user", "groceries_password"
			);
		} catch (ClassNotFoundException | SQLException exeption) {
			throw new RuntimeException(exeption);
		}

        return connection;
	}
}