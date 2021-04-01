TARGETNAME = build
all:$(TARGETNAME)
main.o:main.cpp
    g++ -g -O0 -Wall -fPIC -c $^

$(TARGETNAME):main.o
    g++ -o $@ $^

.PHONY:clean
clean:
    rm -f $(TARGETNAME) main.o