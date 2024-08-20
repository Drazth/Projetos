import pywhatkit

phone_nember = '+553491361854'
message = 'mensagem automática enviada pelo Python!'
hours = 21
minutes = 6

pywhatkit.sendwhatmsg(phone_nember, message, hours, minutes)
print('Mensagem enviada!!')