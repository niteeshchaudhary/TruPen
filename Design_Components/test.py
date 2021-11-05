print("Input file name:")
str = input()
file = open(str, 'r')
s = ""
while 1:
    char = file.read(1)         
    if not char:
        break
    elif char=='{' or char=='}':
        if len(s)!=0 and s[-1]!='\n': s+="\n"
        s += char+"\n"
    elif char==";":
        s += ";\n"
    else:
        s += char
file.close()
file = open(str, 'w+')
file.write(s)
file.close()