<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of any modern web application framework, making it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 1100 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for helping fund on-going Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell):

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[British Software Development](https://www.britishsoftware.co)**
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Pulse Storm](http://www.pulsestorm.net/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Here is Routes URL with Verb:

1) Register: Verb:POST, URL:http://localhost:8000/api/register

2) Login: Verb:POST, URL:http://localhost:8000/oauth/token
	- Sample raw data

	- {
		"client_id": "2",
		"client_secret": "Ha6NSXNotjN1ZUmGRdN9LlqShdd282i7swHfXNn1",
		"grant_type": "password",
		"username": "user@gmail.com",
		"password": "user2123",
		"scope": "*"
	}

3) Show Login User: Verb:GET, URL:http://localhost:8000/api/user
	
	'headers' => [
	    'Accept' => 'application/json',
	    'Content-Type' => 'application/json',
	    'Authorization' => 'Bearer '.$accessToken,
	]

4) Update: Verb:POST, URL:http://localhost:8000/api/update_user?name=name&email=example@gmail.com&password=pwd&id=2

5) Delete: Verb:DELETE, URL:http://localhost:8000/api/delete_user?id=2

6) Artical Store: Verb:POST, URL:http://localhost:8000/api/artical/store?title=title&content=content

7) Artical List: Verb:GET, URL:http://localhost:8000/api/artical/index

8) Artical Show: Verb:GET, URL:http://localhost:8000/api/artical/6666

9) Artical Update: Verb:PATCH, URL:http://localhost:8000/api/artical/5?title=title&content=content

10) Artical Destroy: Verb:DELETE, URL:http://localhost:8000/api/artical/5

11) Post Store: Verb:POST, URL:http://localhost:8000/api/post/store?title=title&content=content

12) Post List: Verb:GET, URL:http://localhost:8000/api/post/index

13) Post Update: Verb:PATCH, URL:http://localhost:8000/api/post/3?title=title&content=content

14) Post Destroy: Verb:DELETE, URL:http://localhost:8000/api/post/3