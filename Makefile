DOCKER?=docker
DOCKER_COMPOSE?=docker compose

up:
	$(DOCKER_COMPOSE) up -d

sh:
	$(DOCKER_COMPOSE) exec -it php sh

bench-short:
	$(DOCKER_COMPOSE) exec -it php ./vendor/bin/phpbench run tests/Benchmark --report=default

bench:
	$(DOCKER_COMPOSE) exec -it php ./vendor/bin/phpbench run tests/Benchmark --report=aggregate --iterations=10 --revs=5

bench-dompdf:
	$(DOCKER_COMPOSE) exec -it php ./vendor/bin/phpbench run tests/Benchmark/DompdfBench.php --report=default

bench-mpdf:
	$(DOCKER_COMPOSE) exec -it php ./vendor/bin/phpbench run tests/Benchmark/MpdfBench.php --report=default

bench-gotenberg:
	$(DOCKER_COMPOSE) exec -it php ./vendor/bin/phpbench run tests/Benchmark/GotenbergBench.php --report=default

bench-snappy:
	$(DOCKER_COMPOSE) exec -it php ./vendor/bin/phpbench run tests/Benchmark/SnappyBench.php --report=default

bench-tcpdf:
	$(DOCKER_COMPOSE) exec -it php ./vendor/bin/phpbench run tests/Benchmark/TcpdfBench.php --report=default

