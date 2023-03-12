import tkinter
from tkinter import *


root = Tk() 

root.title("To-Do-List")
root.geometry("400x650+400+100") 
root.resizable(False,False)


task_list=[]

#icon
image_icon=PhotoImage(file="images/task.png")
root.iconphoto(False, image_icon)

#top bar
top_image=PhotoImage(file="images/topbar.png")
Label(root,image=top_image).pack()

dock_image = PhotoImage(file="images/dock.png")
Label(root,image=dock_image,bg="#32405b").place(x=30,y=25)    

note_image=PhotoImage(file="images/task.png")
Label(root,image=note_image,bg="#32405b").place(x=30,y=25)

heading=Label(root,text="ALL TASK",font="arial 20 bold", fg="white",bg="#32405b")
heading.place(x=130,y=20)


#main
frame=Frame(root,width=400,height=50,bg="white")
frame.place(x=0,y=180)

task=StringVar()
task_entry=Entry(frame,width=18,font="arial 20", bd=0)
task_entry.place(x=10,y=7)
task_entry.focus()
 
button=Button(frame,text="ADD",font="arial 20",width=6,bg="#5a95ff",fg="#fff",bd=0)
button.place(x=300,y=0)

#listbox
frame1=Frame(root,bd=3,width=700,height=280,bg="#32405b")
frame1.pack(pady=(160,0))

listbox=Listbox(frame1,font=("arial",12),width=40,height=16,bg="#32405b", fg="white",cursor="hand2",selectbackground="#5a95ff")
listbox.pack(side=LEFT,fill=BOTH,padx=2)
scrollbar=Scrollbar(frame1) 
scrollbar.pack(side=RIGHT,fill=BOTH)

listbox.config(yscrollcommand=scrollbar.set)
scrollbar.config(command=listbox.yview)

#delete
delete_icon=PhotoImage(file="images/delete.png")
Button(root,image=delete_icon,bd=0).pack(side=BOTTOM,pady=13)



root.mainloop() 