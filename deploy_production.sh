#!/bin/bash

S3_BUCKET=ca-com.life

aws --profile ca-com s3 cp --recursive ./lp/ s3://${S3_BUCKET}/
