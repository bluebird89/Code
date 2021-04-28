package com.example.tdd;

import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.assertEquals;

public class GameNumberTest {


    @Test
    void should_create_game_number_from_raw_number() {
        GameNumber gameNumber = new GameNumber(1);
        assertEquals("1", gameNumber.toString());
    }

    @Test
    void should_create_fizz_from_divied_by_3() {
        GameNumber gameNumber = new GameNumber(9);
        assertEquals("Fizz", gameNumber.toString());
    }

    @Test
    void should_create_buzz_from_divied_by_5() {
        GameNumber gameNumber = new GameNumber(10);
        assertEquals("Buzz", gameNumber.toString());
    }

    @Test
    void should_create_fizzbuzz_from_divied_by_3_and_5() {
        GameNumber gameNumber = new GameNumber(30);
        assertEquals("FizzBuzz", gameNumber.toString());
    }
}
