DOCKER?=docker
DOCKER_COMPOSE?=docker compose

up:
	$(DOCKER_COMPOSE) -f docker-compose.yml up -d
	$(DOCKER) cp php:/app/vendor ./
	$(DOCKER_COMPOSE) up -d

build:
	$(DOCKER_COMPOSE) build

sh:
	$(DOCKER_COMPOSE) exec -it php sh

bench-short:
	$(DOCKER_COMPOSE) exec -it php ./vendor/bin/phpbench run tests/Benchmark/Tests --report=aggregate

bench-strongest:
	$(DOCKER_COMPOSE) exec -it php ./vendor/bin/phpbench run tests/Benchmark/Tests/GotenbergBench.php tests/Benchmark/Tests/HeadlessChromeBench.php tests/Benchmark/Tests/WeasyPrintBench.php tests/Benchmark/Tests/WkhtmltopdfBench.php --report=aggregate

bench:
	$(DOCKER_COMPOSE) exec -it php ./vendor/bin/phpbench run tests/Benchmark/Tests --report=aggregate --iterations=10 --revs=5

bench-dompdf:
	$(DOCKER_COMPOSE) exec -it php ./vendor/bin/phpbench run tests/Benchmark/Tests/DompdfBench.php --report=aggregate

bench-mpdf:
	$(DOCKER_COMPOSE) exec -it php ./vendor/bin/phpbench run tests/Benchmark/Tests/MpdfBench.php --report=aggregate

bench-gotenberg:
	$(DOCKER_COMPOSE) exec -it php ./vendor/bin/phpbench run tests/Benchmark/Tests/GotenbergBench.php --report=aggregate

bench-wkhtml:
	$(DOCKER_COMPOSE) exec -it php  ./vendor/bin/phpbench run tests/Benchmark/Tests/WkhtmltopdfBench.php --report=aggregate

bench-tcpdf:
	$(DOCKER_COMPOSE) exec -it php ./vendor/bin/phpbench run tests/Benchmark/Tests/TcpdfBench.php --report=aggregate

bench-weasy:
	$(DOCKER_COMPOSE) exec -it php ./vendor/bin/phpbench run tests/Benchmark/Tests/WeasyPrintBench.php --report=aggregate

bench-chrome:
	$(DOCKER_COMPOSE) exec -it php ./vendor/bin/phpbench run tests/Benchmark/Tests/HeadlessChromeBench.php --report=aggregate

