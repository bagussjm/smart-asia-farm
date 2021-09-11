# E-Ticket Asia Farm API Spec v1.0.0

## Description

User API Spec

## Authentication

No authentication needed to use this API

## Create User

Request :
- Method : POST
- Endpoint : `/api/user`
- Header :
    - Content-Type: application/json
    - Accept: application/json
- Body :

```json 
{
   "email" : "string",
   "password" : "string",
   "jenis_pengguna" : "enum['admin','pengelola','pelanggan']",
   "nama_lengkap" : "string",
   "no_hp" : "string",
   "alamat" : "text",
   "jenis_kelamin" : "enum['laki-laki','perempuan']",
   "tanggal_lahir" : "date",
   "tempat_lahir" : "string",
}
```

Response :

```json 
{
    "code" : "number",
    "status" : "string",
    "data" : {
        "id" : "string,unique",
        "email" : "string",
        "password" : "string",
        "jenis_pengguna" : "enum['admin','pengelola','pelanggan']",
        "nama_lengkap" : "string",
        "no_hp" : "string",
        "alamat" : "text",
        "jenis_kelamin" : "enum['laki-laki','perempuan']",
        "tanggal_lahir" : "date",
        "tempat_lahir" : "string",
        "created_at" : "timestamps",
        "updated_at" : "timestamps",
        "deleted_at" : "timestamps",
     }
}
```

## Get User

Request :
- Method : GET
- Endpoint : `/api/user/{id}`
- Header :
    - Accept: application/json

Response :

```json 
{
    "code" : "number",
    "status" : "string",
    "data" : {
         "id" : "string,unique",
         "email" : "string",
         "password" : "string",
         "jenis_pengguna" : "enum['admin','pengelola','pelanggan']",
         "nama_lengkap" : "string",
         "no_hp" : "string",
         "alamat" : "text",
         "jenis_kelamin" : "enum['laki-laki','perempuan']",
         "tanggal_lahir" : "date",
         "tempat_lahir" : "string",
         "created_at" : "timestamps",
         "updated_at" : "timestamps",
         "deleted_at" : "timestamps",
     }
}
```

## Update User

Request :
- Method : PUT
- Endpoint : `/api/user/{id}`
- Header :
    - Content-Type: application/json
    - Accept: application/json
- Body :

```json 
{
   "email" : "string",
   "password" : "string",
   "jenis_pengguna" : "enum['admin','pengelola','pelanggan']",
   "nama_lengkap" : "string",
   "no_hp" : "string",
   "alamat" : "text",
   "jenis_kelamin" : "enum['laki-laki','perempuan']",
   "tanggal_lahir" : "date",
   "tempat_lahir" : "string",
}
```

Response :

```json 
{
    "code" : "number",
    "status" : "string",
    "data" : {
         "id" : "string,unique",
         "email" : "string",
         "password" : "string",
         "jenis_pengguna" : "enum['admin','pengelola','pelanggan']",
         "nama_lengkap" : "string",
         "no_hp" : "string",
         "alamat" : "text",
         "jenis_kelamin" : "enum['laki-laki','perempuan']",
         "tanggal_lahir" : "date",
         "tempat_lahir" : "string",
         "created_at" : "timestamps",
         "updated_at" : "timestamps",
         "deleted_at" : "timestamps",
     }
}
```

## List User

Request :
- Method : GET
- Endpoint : `/api/user`
- Header :
    - Accept: application/json
- Query Param :
    - size : number,
    - page : number

Response :

```json 
{
    "code" : "number",
    "status" : "string",
    "data" : [
        {
            "id" : "string,unique",
            "email" : "string",
            "password" : "string",
            "jenis_pengguna" : "enum['admin','pengelola','pelanggan']",
            "nama_lengkap" : "string",
            "no_hp" : "string",
            "alamat" : "text",
            "jenis_kelamin" : "enum['laki-laki','perempuan']",
            "tanggal_lahir" : "date",
            "tempat_lahir" : "string",
            "created_at" : "timestamps",
            "updated_at" : "timestamps",
            "deleted_at" : "timestamps",
        },
        {
            "id" : "string,unique",
            "email" : "string",
            "password" : "string",
            "jenis_pengguna" : "enum['admin','pengelola','pelanggan']",
            "nama_lengkap" : "string",
            "no_hp" : "string",
            "alamat" : "text",
            "jenis_kelamin" : "enum['laki-laki','perempuan']",
            "tanggal_lahir" : "date",
            "tempat_lahir" : "string",
            "created_at" : "timestamps",
            "updated_at" : "timestamps",
            "deleted_at" : "timestamps",
         }
    ]
}
```

## Delete User

Request :
- Method : DELETE
- Endpoint : `/api/user/id`
- Header :
    - Accept: application/json

Response :

```json 
{
    "code" : "number",
    "status" : "string"
}
```
