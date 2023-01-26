import mysql.connector,os

conn = mysql.connector.connect(
            user=os.environ['user1'],
            password=os.environ['pass1'],
            host=os.environ['host1'],
            database=os.environ['bd1'])

cur = conn.cursor(buffered=True)
sql = "update colas_querys_arbovirus set cEstado='1',vProgreso='0%',vRuta='' where cEstado='2' "
cur.execute(sql)
conn.commit()

while True:
    try:
        cur = conn.cursor(buffered=True)
        sql = "update colas_querys_arbovirus set cEstado='2' where cEstado='1' order by fecReg asc limit 1"
        cur.execute(sql)
        conn.commit()
        num_upd = cur.rowcount
        if num_upd>0:
           exec(open("generador.py").read())
    except Exception: # Catch exception which will be raise in connection loss

        conn = mysql.connector.connect(
              user=os.environ['user1'],
            password=os.environ['pass1'],
            host=os.environ['host1'],
            database=os.environ['bd1'])
        cur = conn.cursor(buffered=True)


conn.close()    # Close the connection


