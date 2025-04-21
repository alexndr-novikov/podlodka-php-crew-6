DOCKER?=docker
DOCKER_COMPOSE?=docker compose

up:
	$(DOCKER_COMPOSE) up -d

sh:
	$(DOCKER_COMPOSE) exec -it php sh

bench:
	$(DOCKER_COMPOSE) exec -it php ./vendor/bin/phpbench run tests/Benchmark/DompdfBench.php --report=default
