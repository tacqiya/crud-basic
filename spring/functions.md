1. create a folder with projectname.
2. create package model
3. example UserModel.java
4. create setter & getter
5. create hashcode & equals
6. create toString

7. create package repository
8. example UserRepository.java

9. create package service
10. example UserService.java

11. create package controller
12. example UserController.java
13. return view

14. index goes to resources/static
15. html pages goes to resources/templates
16. css goes to resources/static, create folder css


MySQL application properties:

"
spring.application.name=flipiery

spring.jpa.hibernate.ddl-auto=update
spring.datasource.url=jdbc:mysql://localhost:3306/flipiery_spring
spring.datasource.username=root
spring.datasource.password=
spring.datasource.driver-class-name=com.mysql.cj.jdbc.Driver
server.port = 8090
#spring.jpa.show-sql: true
"