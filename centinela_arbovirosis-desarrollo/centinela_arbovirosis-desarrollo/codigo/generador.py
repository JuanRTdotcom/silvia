import xlsxwriter, mysql.connector,sys,time,os
from datetime import datetime

#databse
connColas = mysql.connector.connect(
           user=os.environ['user1'],
            password=os.environ['pass1'],
            host=os.environ['host1'],
            database=os.environ['bd1'])

curColas = connColas.cursor()

sql = "select * from colas_querys_arbovirus where cEstado='2' "
#and ficha_cancer.vCodDiresa in ('50')

curColas.execute(sql)


rs= curColas.fetchall()

#sql2 = "select count(*)as total from cancer.ficha_cancer "
#cur.execute(sql2)
#rs2= cur.fetchall()
total=curColas.rowcount
if total>0:
        for row in rs:
                sql2 = row[2]
                usu = row[1]
                id = row[0]

#cur.close()
#del cur

#connColas.close()

if total>0:

        conn = mysql.connector.connect(
                 host=os.environ['host2'],
                             user=os.environ['user2'],
                             password=os.environ['pass2'],
                             database=os.environ['bd2'])

        cur = conn.cursor()
        cur.execute(sql2)
        rs= cur.fetchall()


        total_filas=cur.rowcount
        #print(rows_affected)
        now = datetime.now()
        current_date = now.strftime("%Y%m%d%H%M%S")
        ruta = "/tmp/descargas/"+ usu+"_"+current_date+".xlsx"
        nombre_archivo =  usu+"_"+current_date+".xlsx"

        wb = xlsxwriter.Workbook(ruta,{'constant_memory': True})
        wb.use_zip64()
        ws = wb.add_worksheet('DATA')
        rownum = 1
        cant = total_filas
        timeout = time.time() + 5   # 5 seg from now
        for rec in rs:
                #print(str(rec))
                columnas = [column[0] for column in cur.description]
                #print(str(columnas))
                ws.write_row(0,0,columnas)
                ws.write_row(rownum,0,rec)
                rownum += 1
                porcentaje = round((rownum*100) /  cant)
                if time.time() > timeout:
                        sql3="update colas_querys_arbovirus set vProgreso='"+ str(porcentaje)+"%" +"' where id='"+ str(id) +"'"
                        curColas.execute(sql3)
                        connColas.commit()
                        timeout = time.time() + 5
                print(round(porcentaje),"%")
                sys.stdout.write("\033[F")
        
        


                        
        wb.close()
                

        cur.close()
        del cur

        conn.close()



        sql3="update colas_querys_arbovirus set vProgreso='100%',cEstado='3',vRuta='"+ str(nombre_archivo)  +"' where id='"+ str(id) +"'"
        curColas.execute(sql3)
        connColas.commit()

        curColas.close()
        del curColas

        connColas.close()

        print("Completado!")
        #exec(open("prueba2.py").read())

else:
        curColas.close()
        del curColas
        connColas.close()
        #exec(open("prueba2.py").read())       

