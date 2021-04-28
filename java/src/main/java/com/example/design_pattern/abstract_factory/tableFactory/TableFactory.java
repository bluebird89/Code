package com.example.design_pattern.abstract_factory.tableFactory;

import com.example.design_pattern.abstract_factory.factory.Factory;
import com.example.design_pattern.abstract_factory.factory.Link;
import com.example.design_pattern.abstract_factory.factory.Page;
import com.example.design_pattern.abstract_factory.factory.Tray;

public class TableFactory extends Factory {
    @Override
    public Link createLink(String caption, String url) {
        return new com.example.design_pattern.abstract_factory.tableFactory.TableLink(caption, url);
    }

    @Override
    public Tray createTray(String caption) {
        return new com.example.design_pattern.abstract_factory.tableFactory.TableTray(caption);
    }

    @Override
    public Page createPage(String title, String author) {
        return new TablePage(title, author);
    }
}
