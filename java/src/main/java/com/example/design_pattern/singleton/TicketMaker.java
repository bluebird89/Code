package com.example.design_pattern.singleton;

public class TicketMaker {
    private static final TicketMaker singleton = new TicketMaker();
    private int ticket = 1000;

    private TicketMaker() {
    }

    public static TicketMaker getInstance() {
        return singleton;
    }

    public synchronized int getNextTicketNumber() {
        return ticket++;
    }
}
