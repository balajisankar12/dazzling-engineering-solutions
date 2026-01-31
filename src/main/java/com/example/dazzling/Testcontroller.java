package com.example.dazzling;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class Testcontroller {

    @GetMapping("/ok")
    public String ok() {
        return "Backend working without controller package!";
    }
}
