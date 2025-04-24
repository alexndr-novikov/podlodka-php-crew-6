# PHP PDF Bench

This repository is designed to benchmark the performance of various PHP libraries for generating and manipulating PDF files. It provides a framework to compare speed, memory usage, and other performance metrics across different libraries.

## Features

- Benchmark popular PHP PDF libraries.
- Measure execution time and memory usage.
- Generate detailed reports for performance comparison.

## Requirements

- Docker is all you need to run the benchmarks.

## Installation

1. Clone the repository:
   ```bash
   git clone git@github.com:alexndr-novikov/podlodka-php-crew-6.git
   cd podlodka-php-crew-6
   ```

2. Install dependencies using Composer:
   ```bash
   make build
   make up
   ```

## Usage

1. Configure the benchmark settings in the configuration file (if applicable).
2. Run the benchmark script:
   ```bash
   make bench
   ```
3. View the results in the console or generated report files.
4. If using Gotenberg, ensure the Gotenberg server is running and accessible.
5. If you want to benchmark a huge file, download it from [this link](https://drive.google.com/file/d/1b98T4vnQISQRPzckx-SqB9L3h5_wILne/view?usp=sharing) and place it in the `tests/data` directory.

## Libraries Benchmarked

The following PHP libraries are included in the benchmark (list may vary based on configuration):
- [TCPDF](https://tcpdf.org/)
- [FPDF](http://www.fpdf.org/)
- [mPDF](https://mpdf.github.io/)
- [Dompdf](https://github.com/dompdf/dompdf)
- [Gotenberg](https://gotenberg.dev/)

## Contributing

Contributions are welcome! Please follow these steps:
1. Fork the repository.
2. Create a new branch for your feature or bugfix.
3. Submit a pull request with a detailed description of your changes.

`