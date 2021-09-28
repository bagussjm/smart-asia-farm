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
        "id" : "bigint,unique",
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
         "id" : "bigint,unique",
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
         "id" : "bigint,unique",
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
            "id" : "bigint,unique",
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
            "id" : "bigint,unique",
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
- Endpoint : `/api/user/{id}`
- Header :
    - Accept: application/json

Response :

```json 
{
    "code" : "number",
    "status" : "string"
}
```
## Show Authenticated User charts

Description : Showing unprocessed user carts

Request : 
- Method : GET
- Endpoint : `/api/user/{id}/keranjang`
- Header : 
    - Accept: application/json
    
Response : 

```json
{
  "code" : "number",
  "status" : "string",
  "data" : [
      {
         "id" : "bigint,unique",
         "id_user" : "bigint",
         "id_wahana" : "bigint",
         "id_tiket" : "string",
         "status_keranjang" : "enum['belum diproses','diproses']",
         "created_at" : "timestamps",
         "updated_at" : "timestamps",
         "deleted_at" : "timestamps",
         "user" : {
               "id" : "bigint,unique",
               "email" : "string",
               "jenis_pengguna" : "enum['admin','pengelola','pelanggan']",
               "nama_lengkap" : "string",
               "no_hp" : "string",
               "alamat" : "text",
               "jenis_kelamin" : "enum['laki-laki','perempuan']",
               "tanggal_lahir" : "date",
               "tempat_lahir" : "string",
               "created_at" : "timestamps",
               "updated_at" : "timestamps",
               "deleted_at" : "timestamps"
         },
         "wahana" : {
               "id" : "bigint,unique",
                "nama_wahana" : "string",
                "deskripsi_wahana" : "text",
                "profil_wahana" : "text",
                "gambar_wahana" : [
                     "text",
                     "text"
                 ],
                "tarif_tiket" : "integer",
                "masa_aktif" : "string",
                "syarat_ketentuan" : "text",
                "created_at" : "timestamps",
                "updated_at" : "timestamps",
                "deleted_at" : "timestamps"
         },
         "tiket" : {
                "id" : "string,unique",
                 "tanggal_masuk" : "date",
                 "jam_masuk" : "time",
                 "status" : "enum['pending','success','failed']",
                 "total_bayar" : "integer",
                 "kode_qr" : "text",
                 "instruksi_pembayaran" : "text",
                 "created_at" : "timestamps",
                 "updated_at" : "timestamps",
                 "deleted_at" : "timestamps"
         }
      },
      {
         "id" : "bigint,unique",
         "id_user" : "bigint",
         "id_wahana" : "bigint",
         "id_tiket" : "string",
         "status_keranjang" : "enum['belum diproses','diproses']",
         "created_at" : "timestamps",
         "updated_at" : "timestamps",
         "deleted_at" : "timestamps",
         "user" : {
               "id" : "bigint,unique",
               "email" : "string",
               "jenis_pengguna" : "enum['admin','pengelola','pelanggan']",
               "nama_lengkap" : "string",
               "no_hp" : "string",
               "alamat" : "text",
               "jenis_kelamin" : "enum['laki-laki','perempuan']",
               "tanggal_lahir" : "date",
               "tempat_lahir" : "string",
               "created_at" : "timestamps",
               "updated_at" : "timestamps",
               "deleted_at" : "timestamps"
         },
         "wahana" : {
               "id" : "bigint,unique",
                "nama_wahana" : "string",
                "deskripsi_wahana" : "text",
                "profil_wahana" : "text",
                "gambar_wahana" : [
                     "text",
                     "text"
                 ],
                "tarif_tiket" : "integer",
                "masa_aktif" : "string",
                "syarat_ketentuan" : "text",
                "created_at" : "timestamps",
                "updated_at" : "timestamps",
                "deleted_at" : "timestamps"
         },
         "tiket" : {
                "id" : "string,unique",
                 "tanggal_masuk" : "date",
                 "jam_masuk" : "time",
                 "status" : "enum['pending','success','failed']",
                 "total_bayar" : "integer",
                 "kode_qr" : "text",
                 "instruksi_pembayaran" : "text",
                 "created_at" : "timestamps",
                 "updated_at" : "timestamps",
                 "deleted_at" : "timestamps"
         }
      }
  ]
}   
```

## Show Authenticated User Ticket
Description : Default Is showing unprocessed user carts

Request : 
- Method : GET
- Endpoint : `/api/user/{id}/keranjang`
- Query Param : 
    - status: enum ['pending','success','failed']
- Header : 
    - Accept: application/json

- Response 
```json
{
  "code" : "number",
  "status" : "string",
  "data" : [
      {
          "id" :  "string,unique",
          "tanggal_masuk" : "date",
          "jam_masuk" :  "time",
          "status" : "enum['pending','success','failed']",
          "total_bayar" :  "int",
          "kode_qr" : "text",
          "instruksi_pembayaran" :  "text",
          "created_at" : "timestamps",
          "updated_at" :  "timestamps",
          "deleted_at" : "timestamps"
      },
      {
         "id" :  "string,unique",
         "tanggal_masuk" : "date",
         "jam_masuk" :  "time",
         "status" : "enum['pending','success','failed']",
         "total_bayar" :  "int",
         "kode_qr" : "text",
         "instruksi_pembayaran" :  "text",
         "created_at" : "timestamps",
         "updated_at" :  "timestamps",
         "deleted_at" : "timestamps"
      } 
  ]
}
```
