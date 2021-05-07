FROM golang as compiler
RUN CGO_ENABLED=0 go get -a -ldflags '-s' \
    github.com/morvencao/helloworld
FROM scratch
COPY --from=compiler /go/bin/helloworld .
EXPOSE 80
CMD ["./helloworld"]