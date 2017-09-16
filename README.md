Crystal Clear Soft : Test task
======

Разработка
---
- [ADD] Basic architecture **@estimated 30m** (taken from my dev-s)
- [ADD] Module prototype structure **@estimated 30m** (also taked and modified from my dev-s)
- [ADD] Entity Validator **@estimated 25m** (codefreez.)
- [COMPLETE] 50%. Save structures has been completed **@estimated 1h**
- [ADD] And configured jQuery table plugin as prototype **@estimated 1h** (codefreez.)
- [ADD] Fetching data procedure complete. Prepare to edit Frontend **@estimated 1h**
- [ADD] Tuning and fussing with DataTable **@estimated 3h** =/
- [COMPLETE] Refactoring **@estimated 20m**

Требования
---
- Nginx or Apache
- MySQL !<5.5
- PHP !< 5.4
- composer

Установка
---
1. Любым  удобным способом создать базу MySQL и настроить права в конфиге , MySQL:
```
src/DataCollector/Modules/Data/config/module.config.php
docs/test.sql
```
2. В корне запустить ```composer install```
3. И все должно заработать

Что к чему ?
---
Как описано было в ТЗ - зделал несколько точек входа, но по своему

- / - Просмотр раблицы
- /save.php?data={"code":125,"type":4,"message":"Common error in ...", "application":"main project"} - приемник
- /show.php - выгрузка данных таблицы (ajax)

**Чистое время на разработку** : 8 часов +- 30 мин
