package com.smartboodschappenlijstje.smartboodschappenlijstje_api;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.boot.context.event.ApplicationReadyEvent;
import org.springframework.context.event.EventListener;

import java.sql.*;

@SpringBootApplication
public class SmartboodschappenlijstjeApiApplication
{
	public static UserController userC = new UserController();

	public static void main(String[] args)
	{
		SpringApplication.run(SmartboodschappenlijstjeApiApplication.class, args);
	}

	@EventListener(ApplicationReadyEvent.class)
	public void openSwagger()
	{
		new Thread(() -> {
			try {
				Thread.sleep(1500);

				String url = "http://localhost:8080/swagger-ui/index.html";
				String os = System.getProperty("os.name").toLowerCase();

				if (os.contains("win")) {
					Runtime.getRuntime().exec(new String[]{
							"cmd", "/c", "start", url
					});
				} else if (os.contains("mac")) {
					Runtime.getRuntime().exec(new String[]{
							"open", url
					});
				}

			} catch (Exception e) {
				e.printStackTrace();
			}
		}).start();
	}

}