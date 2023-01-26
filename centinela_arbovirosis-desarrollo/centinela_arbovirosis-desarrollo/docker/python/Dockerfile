FROM python:3.11-rc-alpine

COPY requirements.txt ./
RUN pip install --no-cache-dir -r requirements.txt


CMD sh -c "cd /code && python init.py"



