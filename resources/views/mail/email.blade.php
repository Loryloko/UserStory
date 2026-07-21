<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Richiesta Collaborazione Revisore</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f8fafc; color: #0f172a;-webkit-font-smoothing: antialiased;">
    
    <table role="presentation" style="width: 100%; border-collapse: collapse; background-color: #f8fafc; padding: 40px 0;">
        <tr>
            <td align="center" style="padding: 40px 16px;">
                
                <table role="presentation" style="width: 100%; max-width: 550px; border-collapse: collapse; background-color: #ffffff; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03); border: 1px solid #e2e8f0; overflow: hidden;">
                    
                    <tr>
                        <td style="background-color: #0f172a; padding: 32px; text-align: center;">
                            <h1 style="margin: 0; color: #ffffff; font-size: 24px; font-weight: 700; letter-spacing: -0.5px;">
                                Presto.it
                            </h1>
                            <p style="margin: 4px 0 0 0; color: #94a3b8; font-size: 14px;">
                                Portale Amministrazione
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 40px 32px;">
                            <h2 style="margin: 0 0 16px 0; color: #0f172a; font-size: 20px; font-weight: 700; line-height: 1.3;">
                                Nuova Candidatura Ricevuta
                            </h2>
                            <p style="margin: 0 0 24px 0; color: #475569; font-size: 15px; line-height: 1.6;">
                                Un utente registrato sulla piattaforma ha inviato una richiesta formale per collaborare come <strong>revisore degli annunci</strong>. Di seguito i dettagli del profilo:
                            </p>

                            <table role="presentation" style="width: 100%; border-collapse: collapse; background-color: #f1f5f9; border-radius: 8px; margin-bottom: 28px;">
                                <tr>
                                    <td style="padding: 16px 20px; border-bottom: 1px solid #e2e8f0;">
                                        <span style="display: block; font-size: 12px; text-uppercase: true; color: #64748b; font-weight: 600; letter-spacing: 0.5px; text-transform: uppercase; margin-bottom: 2px;">Nome Richiedente</span>
                                        <strong style="font-size: 16px; color: #0f172a;">{{ $user->name }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 16px 20px;">
                                        <span style="display: block; font-size: 12px; text-uppercase: true; color: #64748b; font-weight: 600; letter-spacing: 0.5px; text-transform: uppercase; margin-bottom: 2px;">Indirizzo Email</span>
                                        <a href="mailto:{{ $user->email }}" style="font-size: 16px; color: #0d9488; text-decoration: none; font-weight: 500;">{{ $user->email }}</a>
                                    </td>
                                </tr>
                            </table>

                            <div style="border-left: 4px solid #f59e0b; background-color: #fffbeb; padding: 16px 20px; border-radius: 4px; margin-bottom: 8px;">
                                <p style="margin: 0; font-size: 14px; color: #b45309; line-height: 1.5; font-weight: 500;">
                                    <strong>Nota di sistema:</strong> Per abilitare questo utente ed assegnargli i privilegi di moderazione, apri il terminale del server ed esegui il comando d'automazione programmato.
                                </p>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 24px 32px; background-color: #f8fafc; border-top: 1px solid #e2e8f0; text-align: center;">
                            <p style="margin: 0; font-size: 12px; color: #94a3b8; line-height: 1.5;">
                                Questa è una notifica automatica generata dal sistema di Presto.it.<br>
                                &copy; {{ date('Y') }} Presto.it. Tutti i diritti riservati.
                            </p>
                        </td>
                    </tr>

                </table>
                
            </td>
        </tr>
    </table>

</body>
</html>
