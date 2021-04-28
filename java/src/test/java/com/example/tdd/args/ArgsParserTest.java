package com.example.tdd.args;


import org.junit.jupiter.api.Test;

public class ArgsParserTest {

    @Test
    public void testSchema() {

        Schema schema = new Schema("l:boolean p:integer d:string g:stringlist");
        // assertThat(schema.getValue("l"), is(Boolean.FALSE));
        // assertThat(schema.getValue("p"), is(0));
        // assertThat(schema.getValue("d"), is(""));
        // assertThat(schema.getValue("g"), is(new ArrayList<String>()));
    }

    @Test
    public void testArgsParser() {
        Schema schema = new Schema("l:boolean p:integer d:string g:stringlist");
        String commands = "-l -p 8080 -d /usr/log -g a,b,c,d,e";
        ArgsParser args = new ArgsParser(schema, commands);
        // assertThat(args.getValue("l"), is(Boolean.TRUE));
        // assertThat(args.getValue("p"), is(8080));
        // assertThat(args.getValue("d"), is("/usr/log"));
        // assertThat(args.getValue("g"), is(Arrays.asList("a,b,c,d,e".split(","))));
    }

    @Test
    public void argsNoFlagTest() {
        Schema schema = new Schema("l:boolean p:integer d:string g:stringlist");
        String commands = " -p 8080 -d /usr/log -g a,b,c,d,e";
        ArgsParser args = new ArgsParser(schema, commands);
        // assertThat(args.getValue("l"), is(Boolean.FALSE));
    }
}
