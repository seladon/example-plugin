#!/usr/bin/env bash
#DESCRIPTION: fix code style in src folder

php dev-ops/analyze/vendor/bin/ecs check --fix platform/src --config platform/easy-coding-standard.php
