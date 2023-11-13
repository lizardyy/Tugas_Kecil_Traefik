## Tugas Kecil Komputasi Layanan Api Gateway Traefik

Tugas ini menyesuaikan mock aplikasi grand oak dan pine valley pada link berikut (https://apim.docs.wso2.com/en/latest/integrate/develop/integration-development-kickstart/)

## Setup Project

Jalankan aplikasi dengan command di terminal

```docker compose up -d```

untuk melakukan build ulang jalankan

```docker compose up --build```

app terdiri dari frontend menggunakan Vue 

http://app.localhost/

dan terdiri dari 2 backend 

backend Grand Oak Hospital menggunakan framework microservice laravel (Lumen)

http://app.localhost/grandoak

sedangkan Pine Valley Hospital menggunakan express

http://app.localhost/pinevalley

dapat juga mengecek rute yang ada pada dashboard traefik

http://app.localhost:8080/dashboard/#/


## Call Service 

pada kedua service terdapat 3 category doctorType yaitu 
- Ophthalmologist
- Physician
- Pediatrician

Semua request perlu melampirkan authorization di header, bertipe Basic dengan username dan password test (Authorization: Basic dGVzdDp0ZXN0). Untuk **Grand Oak Hospital Service**, request dapat dilakukan dengan cara

```GET http://app.localhost/grandoak/getdoctor/<doctorType>```

Sedangkan untuk **Pine Valley Hospital** request dapat dilakukan dengan cara

```POST http://app.localhost/grandoak/getdoctor```

dengan body tipe JSON

```
{
  "doctorType": "<doctorType>"
}
```
