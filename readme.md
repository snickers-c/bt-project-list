# Obsah
- [cvičenie 3](#cvičenie-3)
  - Testing z Postman-a [Obrázky](postman-images/cvicenie3/)
  - Praca z hodiny
    - [RPC Controller](#rpc-controller)
    - [SAC Controller](#sac-controller)
    - [REST Controller](#rest-controller)
    - [REST API Controller](#rest-api-controller)
  - Zadanie
    - Adresár controllerov: [Time](prvy/app/Http/Controllers/Time/)
    - Time servis: [TimeSevice](prvy/app/Services/TimeService.php)
    - [RPC Time](#rpc-time)
    - [REST API Time](#rest-api-time)
- [cvičenie 4](#cvičenie-4)
  - Testing z Postman-a [Obrázky](postman-images/cvicenie4/)
  - Zadanie
    - Adresár controllerov: [Controllers](druhy/app/Http/Controllers/)
    - [REST API Notes](#rest-api-notes)
    - [REST API Categories](#rest-api-categories)
- [cvičenie 5](#cvičenie-5)
  - Testing z Postman-a [Obrázky](postman-images/cvicenie5/)
  - Adresár controllerov: [Controllers](druhy/app/Http/Controllers/)
  - Adresár modelov: [Models](druhy/app/Models/)
  - Zadanie
    - [Notes Eloquent ORM](#notes-eloquent-orm)
- [cvičenie 6](#cvičenie-6)
  - Testing z Postman-a [Obrázky](postman-images/cvicenie6/)
  - Adresár controllerov: [Controllers](druhy/app/Http/Controllers/)
  - [Zadanie 1](#zadanie-6-1)
  - [Zadanie 2](#zadanie-6-2)
  - [Zadanie 3](#zadanie-6-3)
- [cvičenie 7](#cvičenie-7)
  - Testing z Postman-a [Obrázky](postman-images/cvicenie7/)
  - Adresár controllerov: [Controllers](druhy/app/Http/Controllers/)
  - Súbor Auth Controller: [AuthController](druhy/app/Http/Controllers/AuthController.php)
  - [Auth Controller](#auth-controller)
- [cvičenie 8](#cvičenie-8)
  - Testing z Postman-a [Obrázky](postman-images/cvicenie8/)
  - Adresár controllerov: [Controllers](druhy/app/Http/Controllers/)
  - Adresár modelov: [Models](druhy/app/Models/)
  - Adresár policies: [Policies](druhy/app/Policies/)
  - Api routes: [api](druhy/routes/api.php)
  - [Zadanie 1](#zadanie-8-1)
  - [Zadanie 2](#zadanie-8-2)

# Cvičenia

## Cvičenie 3

### RPC Controller
borrow
![image](/postman-images/cvicenie3/rpc-borrow.png)

return
![image](/postman-images/cvicenie3/rpc-return.png)

### SAC Controller
SAC invoke
![image](/postman-images/cvicenie3/sac.png)

### REST Controller
index
![image](/postman-images/cvicenie3/rest/index.png)

create
![image](/postman-images/cvicenie3/rest/create.png)

store
![image](/postman-images/cvicenie3/rest/store.png)

show
![image](/postman-images/cvicenie3/rest/show.png)

edit
![image](/postman-images/cvicenie3/rest/edit.png)

update
![image](/postman-images/cvicenie3/rest/update.png)

destroy
![image](/postman-images/cvicenie3/rest/destroy.png)

### REST API Controller
index
![image](/postman-images/cvicenie3/rest-api/index.png)

store
![image](/postman-images/cvicenie3/rest-api/store.png)

show
![image](/postman-images/cvicenie3/rest-api/show.png)

update
![image](/postman-images/cvicenie3/rest-api/update.png)

destroy
![image](/postman-images/cvicenie3/rest-api/destroy.png)

### RPC Time
getTime
![image](/postman-images/cvicenie3/rpc-time/getTime.png)

### REST API Time
time
![image](/postman-images/cvicenie3/api-time/time.png)

## Cvičenie 4

### REST API Notes
index
![image](/postman-images/cvicenie4/notes/index.png)

store
![image](/postman-images/cvicenie4/notes/store.png)

show
![image](/postman-images/cvicenie4/notes/show.png)

update
![image](/postman-images/cvicenie4/notes/update.png)

destroy
![image](/postman-images/cvicenie4/notes/destroy.png)

status
![image](/postman-images/cvicenie4/notes/status.png)

archive
![image](/postman-images/cvicenie4/notes/archive.png)

user
![image](/postman-images/cvicenie4/notes/user.png)

search
![image](/postman-images/cvicenie4/notes/search.png)

duplicate
![image](/postman-images/cvicenie4/notes/duplicate.png)

### REST API Categories
index
![image](/postman-images/cvicenie4/categories/index.png)

store
![image](/postman-images/cvicenie4/categories/store.png)

show
![image](/postman-images/cvicenie4/categories/show.png)

update
![image](/postman-images/cvicenie4/categories/update.png)

destroy
![image](/postman-images/cvicenie4/categories/destroy.png)

## Cvičenie 5

### Notes Eloquent ORM
publish
![image](/postman-images/cvicenie5/publish.png)
archive
![image](/postman-images/cvicenie5/archive.png)
pin
![image](/postman-images/cvicenie5/pin.png)
unpin
![image](/postman-images/cvicenie5/unpin.png)

## Cvičenie 6

### Zadanie 6-1
úspešný show response
![image](/postman-images/cvicenie6/zadanie1/uspesny.png)

neúspešný show response
![image](/postman-images/cvicenie6/zadanie1/neuspesny.png)

### Zadanie 6-2
store
![image](/postman-images/cvicenie6/zadanie2/store.png)

store duplicate
![image](/postman-images/cvicenie6/zadanie2/store-duplicate.png)

update
![image](/postman-images/cvicenie6/zadanie2/update.png)

update duplicate
![image](/postman-images/cvicenie6/zadanie2/update-duplicate.png)

### Zadanie 6-3
index
![image](/postman-images/cvicenie6/zadanie3/index.png)

store
![image](/postman-images/cvicenie6/zadanie3/store.png)

store notfound
![image](/postman-images/cvicenie6/zadanie3/store-notfound.png)

update
![image](/postman-images/cvicenie6/zadanie3/update.png)

update missing
![image](/postman-images/cvicenie6/zadanie3/update-missing.png)

## Cvičenie 7

### Auth Controller
register
![image](/postman-images/cvicenie7/register.png)

register - použítý email
![image](/postman-images/cvicenie7/register-422.png)

login
![image](/postman-images/cvicenie7/login.png)

login - rate limit
![image](/postman-images/cvicenie7/login-rate-limit.png)

me
![image](/postman-images/cvicenie7/me.png)

logout
![image](/postman-images/cvicenie7/logout.png)

removeAll
![image](/postman-images/cvicenie7/remove-all.png)

tokens
![image](/postman-images/cvicenie7/tokens.png)

tokens - remove all
![image](/postman-images/cvicenie7/tokens-remove-all.png)

changePass
![image](/postman-images/cvicenie7/change-pass.png)

login - zmenené heslo
![image](/postman-images/cvicenie7/login-change-pass.png)

changeProfile
![image](/postman-images/cvicenie7/change-profile.png)

me - zmenený profil
![image](/postman-images/cvicenie7/me-change-profile.png)

## Cvičenie 8

### Zadanie 8-1
my notes
![image](/postman-images/cvicenie8/zadanie1/my-notes.png)

note delete 403
![image](/postman-images/cvicenie8/zadanie1/note-delete-403.png)

note update 403
![image](/postman-images/cvicenie8/zadanie1/note-update-403.png)

### Zadanie 8-2
index
![image](/postman-images/cvicenie8/zadanie2/index.png)

store
![image](/postman-images/cvicenie8/zadanie2/store.png)

show
![image](/postman-images/cvicenie8/zadanie2/show.png)

update
![image](/postman-images/cvicenie8/zadanie2/update.png)

destroy
![image](/postman-images/cvicenie8/zadanie2/destroy.png)

index komentar pod task 
![image](/postman-images/cvicenie8/zadanie2/index-task.png)

store komentar pod task 
![image](/postman-images/cvicenie8/zadanie2/store-task.png)

show komentar pod task 
![image](/postman-images/cvicenie8/zadanie2/show-task.png)

update komentar pod task 
![image](/postman-images/cvicenie8/zadanie2/update-task.png)

destroy komentar pod task 
![image](/postman-images/cvicenie8/zadanie2/destroy-task.png)