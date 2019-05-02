这个命令来填充数据库，该命令会回滚并重新运行所有迁移。这个命令可以用来重建数据库：
```
php artisan migrate:refresh --seed
```
导入后台管理数据
```
mysql laravel-shop < database/admin.sql
```
后台账号和密码都是`admin`