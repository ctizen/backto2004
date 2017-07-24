.PHONY: dev
dev:
	php54 -S 127.0.0.1:8000 -t www

.PHONY: siege
siege:
		php54 -S 127.0.0.1:8000 -t www > /dev/null 2>&1 & echo "$$!" > srv.pid
		sleep 1
		siege -t5S -b -i -f siege-urls.txt
		kill `cat srv.pid` && rm srv.pid
