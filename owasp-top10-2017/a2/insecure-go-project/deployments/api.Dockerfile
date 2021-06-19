FROM golang

WORKDIR /go/src/github.com/b3d3c/b3d3cLabs/owasp-top10-2017/a2/insecure-go-project/app

COPY app/go.mod app/go.sum ./
RUN go mod download

COPY app/ ./
