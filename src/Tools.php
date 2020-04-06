<?php

class Tools
{
    
    /*
     * Mon Apr 06 16:12:18 BRT 2020:DEBUG:>> "Accept-Encoding: gzip,deflate[\r][\n]"
Mon Apr 06 16:12:18 BRT 2020:DEBUG:>> "Content-Type: text/xml;charset=UTF-8[\r][\n]"
Mon Apr 06 16:12:18 BRT 2020:DEBUG:>> "SOAPAction: "substituirNfse"[\r][\n]"

     */
    
    public function cancelarNFSe()
    {
        /*
         * <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ws="http://ws.issweb.fiorilli.com.br/" xmlns:nfse="http://www.abrasf.org.br/nfse.xsd" xmlns:xd="http://www.w3.org/2000/09/xmldsig#">
   <soapenv:Header/>
   <soapenv:Body>
      <ws:cancelarNfse>
         <!--Optional:-->
         <nfse:CancelarNfseEnvio>
            <nfse:Pedido>
               <nfse:InfPedidoCancelamento Id="?">
                  <nfse:IdentificacaoNfse>
                     <nfse:Numero>?</nfse:Numero>
                     <nfse:CpfCnpj>
                        <!--Optional:-->
                        <nfse:Cpf>?</nfse:Cpf>
                        <!--Optional:-->
                        <nfse:Cnpj>?</nfse:Cnpj>
                     </nfse:CpfCnpj>
                     <!--Optional:-->
                     <nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>
                     <nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>
                  </nfse:IdentificacaoNfse>
                  <!--Optional:-->
                  <nfse:CodigoCancelamento>?</nfse:CodigoCancelamento>
               </nfse:InfPedidoCancelamento>
               <!--Optional:-->
               <xd:Signature Id="?">
                  <xd:SignedInfo Id="?">
                     <xd:CanonicalizationMethod Algorithm="?">
                        e
                        <!--You may enter ANY elements at this point-->
                        gero
                     </xd:CanonicalizationMethod>
                     <xd:SignatureMethod Algorithm="?">
                        cum
                        <!--You have a CHOICE of the next 2 items at this level-->
                        <xd:HMACOutputLength>?</xd:HMACOutputLength>
                        <!--You may enter ANY elements at this point-->
                        sonoras
                     </xd:SignatureMethod>
                     <!--1 or more repetitions:-->
                     <xd:Reference Id="?" URI="?" Type="?">
                        <!--Optional:-->
                        <xd:Transforms>
                           <!--1 or more repetitions:-->
                           <xd:Transform Algorithm="?">
                              aeoliam
                              <!--You have a CHOICE of the next 2 items at this level-->
                              <xd:XPath>?</xd:XPath>
                              <!--You may enter ANY elements at this point-->
                              quae
                           </xd:Transform>
                        </xd:Transforms>
                        <xd:DigestMethod Algorithm="?">
                           ventos
                           <!--You may enter ANY elements at this point-->
                           verrantque
                        </xd:DigestMethod>
                        <xd:DigestValue>cid:1457327905589</xd:DigestValue>
                     </xd:Reference>
                  </xd:SignedInfo>
                  <xd:SignatureValue Id="?">cid:449041622886</xd:SignatureValue>
                  <!--Optional:-->
                  <xd:KeyInfo Id="?">
                     temperat
                     <!--You have a CHOICE of the next 8 items at this level-->
                     <xd:KeyValue>
                        per
                        <!--You have a CHOICE of the next 3 items at this level-->
                        <xd:RSAKeyValue>
                           <xd:Modulus>cid:307062670875</xd:Modulus>
                           <xd:Exponent>cid:1472319879740</xd:Exponent>
                        </xd:RSAKeyValue>
                        <xd:DSAKeyValue>
                           <!--Optional:-->
                           <xd:P>cid:85451272639</xd:P>
                           <!--Optional:-->
                           <xd:Q>cid:577569467920</xd:Q>
                           <!--Optional:-->
                           <xd:G>cid:793771588243</xd:G>
                           <xd:Y>cid:568177557992</xd:Y>
                           <!--Optional:-->
                           <xd:J>cid:1256206024070</xd:J>
                           <!--Optional:-->
                           <xd:Seed>cid:1504239629785</xd:Seed>
                           <!--Optional:-->
                           <xd:PgenCounter>cid:357380512492</xd:PgenCounter>
                        </xd:DSAKeyValue>
                        <!--You may enter ANY elements at this point-->
                        turbine
                     </xd:KeyValue>
                     <xd:MgmtData>?</xd:MgmtData>
                     <xd:SPKIData>
                        <!--You have a CHOICE of the next 2 items at this level-->
                        <xd:SPKISexp>cid:39600945302</xd:SPKISexp>
                        <!--You may enter ANY elements at this point-->
                     </xd:SPKIData>
                     <xd:RetrievalMethod URI="?" Type="?">
                        <!--Optional:-->
                        <xd:Transforms>
                           <!--1 or more repetitions:-->
                           <xd:Transform Algorithm="?">
                              circum
                              <!--You have a CHOICE of the next 2 items at this level-->
                              <xd:XPath>?</xd:XPath>
                              <!--You may enter ANY elements at this point-->
                              regemque
                           </xd:Transform>
                        </xd:Transforms>
                     </xd:RetrievalMethod>
                     <xd:X509Data>
                        <!--You have a CHOICE of the next 6 items at this level-->
                        <xd:X509IssuerSerial>
                           <xd:X509IssuerName>?</xd:X509IssuerName>
                           <xd:X509SerialNumber>?</xd:X509SerialNumber>
                        </xd:X509IssuerSerial>
                        <xd:X509CRL>cid:726203474746</xd:X509CRL>
                        <xd:X509SKI>cid:715130362645</xd:X509SKI>
                        <xd:X509Certificate>cid:1440677286256</xd:X509Certificate>
                        <xd:X509SubjectName>?</xd:X509SubjectName>
                        <!--You may enter ANY elements at this point-->
                     </xd:X509Data>
                     <xd:KeyName>?</xd:KeyName>
                     <xd:PGPData>
                        <!--You have a CHOICE of the next 3 items at this level-->
                        <xd:PGPKeyID>cid:169656366646</xd:PGPKeyID>
                        <xd:PGPKeyPacket>cid:638087260503</xd:PGPKeyPacket>
                        <!--You may enter ANY elements at this point-->
                     </xd:PGPData>
                     <!--You may enter ANY elements at this point-->
                     nimborum
                  </xd:KeyInfo>
                  <!--Zero or more repetitions:-->
                  <xd:Object Id="?" MimeType="?" Encoding="?">
                     fremunt
                     <!--You may enter ANY elements at this point-->
                     foedere
                  </xd:Object>
               </xd:Signature>
            </nfse:Pedido>
         </nfse:CancelarNfseEnvio>
         <!--Optional:-->
         <username>?</username>
         <!--Optional:-->
         <password>?</password>
      </ws:cancelarNfse>
   </soapenv:Body>
</soapenv:Envelope>
         */
        
    }
    
    public function consultarLoteRps()
    {
        /*
         * <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ws="http://ws.issweb.fiorilli.com.br/" xmlns:nfse="http://www.abrasf.org.br/nfse.xsd">
   <soapenv:Header/>
   <soapenv:Body>
      <ws:consultarLoteRps>
         <!--Optional:-->
         <nfse:ConsultarLoteRpsEnvio>
            <nfse:Prestador>
               <!--Optional:-->
               <nfse:CpfCnpj>
                  <!--Optional:-->
                  <nfse:Cpf>?</nfse:Cpf>
                  <!--Optional:-->
                  <nfse:Cnpj>?</nfse:Cnpj>
               </nfse:CpfCnpj>
               <!--Optional:-->
               <nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>
            </nfse:Prestador>
            <nfse:Protocolo>?</nfse:Protocolo>
         </nfse:ConsultarLoteRpsEnvio>
         <!--Optional:-->
         <username>?</username>
         <!--Optional:-->
         <password>?</password>
      </ws:consultarLoteRps>
   </soapenv:Body>
</soapenv:Envelope>
         */
    }
    
    public function consultarNfseProFaixa()
    {
        /*
         * <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ws="http://ws.issweb.fiorilli.com.br/" xmlns:nfse="http://www.abrasf.org.br/nfse.xsd">
   <soapenv:Header/>
   <soapenv:Body>
      <ws:consultarNfsePorFaixa>
         <!--Optional:-->
         <nfse:ConsultarNfseFaixaEnvio>
            <nfse:Prestador>
               <!--Optional:-->
               <nfse:CpfCnpj>
                  <!--Optional:-->
                  <nfse:Cpf>?</nfse:Cpf>
                  <!--Optional:-->
                  <nfse:Cnpj>?</nfse:Cnpj>
               </nfse:CpfCnpj>
               <!--Optional:-->
               <nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>
            </nfse:Prestador>
            <nfse:Faixa>
               <nfse:NumeroNfseInicial>?</nfse:NumeroNfseInicial>
               <!--Optional:-->
               <nfse:NumeroNfseFinal>?</nfse:NumeroNfseFinal>
            </nfse:Faixa>
            <nfse:Pagina>?</nfse:Pagina>
         </nfse:ConsultarNfseFaixaEnvio>
         <!--Optional:-->
         <username>?</username>
         <!--Optional:-->
         <password>?</password>
      </ws:consultarNfsePorFaixa>
   </soapenv:Body>
</soapenv:Envelope>
         */
    }
    
    public function consultarNfsePorRps()
    {
        /*
         * <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ws="http://ws.issweb.fiorilli.com.br/" xmlns:nfse="http://www.abrasf.org.br/nfse.xsd">
   <soapenv:Header/>
   <soapenv:Body>
      <ws:consultarNfsePorRps>
         <!--Optional:-->
         <nfse:ConsultarNfseRpsEnvio>
            <nfse:IdentificacaoRps>
               <nfse:Numero>?</nfse:Numero>
               <nfse:Serie>?</nfse:Serie>
               <nfse:Tipo>?</nfse:Tipo>
            </nfse:IdentificacaoRps>
            <nfse:Prestador>
               <!--Optional:-->
               <nfse:CpfCnpj>
                  <!--Optional:-->
                  <nfse:Cpf>?</nfse:Cpf>
                  <!--Optional:-->
                  <nfse:Cnpj>?</nfse:Cnpj>
               </nfse:CpfCnpj>
               <!--Optional:-->
               <nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>
            </nfse:Prestador>
         </nfse:ConsultarNfseRpsEnvio>
         <!--Optional:-->
         <username>?</username>
         <!--Optional:-->
         <password>?</password>
      </ws:consultarNfsePorRps>
   </soapenv:Body>
</soapenv:Envelope>
         */
    }
    
    public function consultarNfseServicoPrestado()
    {
        /*
         * <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ws="http://ws.issweb.fiorilli.com.br/" xmlns:nfse="http://www.abrasf.org.br/nfse.xsd">
   <soapenv:Header/>
   <soapenv:Body>
      <ws:consultarNfseServicoPrestado>
         <!--Optional:-->
         <nfse:ConsultarNfseServicoPrestadoEnvio>
            <nfse:Prestador>
               <!--Optional:-->
               <nfse:CpfCnpj>
                  <!--Optional:-->
                  <nfse:Cpf>?</nfse:Cpf>
                  <!--Optional:-->
                  <nfse:Cnpj>?</nfse:Cnpj>
               </nfse:CpfCnpj>
               <!--Optional:-->
               <nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>
            </nfse:Prestador>
            <!--Optional:-->
            <nfse:NumeroNfse>?</nfse:NumeroNfse>
            <!--Optional:-->
            <nfse:PeriodoEmissao>
               <nfse:DataInicial>?</nfse:DataInicial>
               <nfse:DataFinal>?</nfse:DataFinal>
            </nfse:PeriodoEmissao>
            <!--Optional:-->
            <nfse:PeriodoCompetencia>
               <nfse:DataInicial>?</nfse:DataInicial>
               <nfse:DataFinal>?</nfse:DataFinal>
            </nfse:PeriodoCompetencia>
            <!--Optional:-->
            <nfse:Tomador>
               <!--Optional:-->
               <nfse:CpfCnpj>
                  <!--Optional:-->
                  <nfse:Cpf>?</nfse:Cpf>
                  <!--Optional:-->
                  <nfse:Cnpj>?</nfse:Cnpj>
               </nfse:CpfCnpj>
               <!--Optional:-->
               <nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>
            </nfse:Tomador>
            <!--Optional:-->
            <nfse:Intermediario>
               <!--Optional:-->
               <nfse:CpfCnpj>
                  <!--Optional:-->
                  <nfse:Cpf>?</nfse:Cpf>
                  <!--Optional:-->
                  <nfse:Cnpj>?</nfse:Cnpj>
               </nfse:CpfCnpj>
               <!--Optional:-->
               <nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>
            </nfse:Intermediario>
            <nfse:Pagina>?</nfse:Pagina>
         </nfse:ConsultarNfseServicoPrestadoEnvio>
         <!--Optional:-->
         <username>?</username>
         <!--Optional:-->
         <password>?</password>
      </ws:consultarNfseServicoPrestado>
   </soapenv:Body>
</soapenv:Envelope>
         */
    }
    
    public function consultarNfseServicoTomado()
    {
        /*
         * <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ws="http://ws.issweb.fiorilli.com.br/" xmlns:nfse="http://www.abrasf.org.br/nfse.xsd">
   <soapenv:Header/>
   <soapenv:Body>
      <ws:consultarNfseServicoTomado>
         <!--Optional:-->
         <nfse:ConsultarNfseServicoTomadoEnvio>
            <nfse:Consulente>
               <nfse:CpfCnpj>
                  <!--Optional:-->
                  <nfse:Cpf>?</nfse:Cpf>
                  <!--Optional:-->
                  <nfse:Cnpj>?</nfse:Cnpj>
               </nfse:CpfCnpj>
               <!--Optional:-->
               <nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>
            </nfse:Consulente>
            <!--Optional:-->
            <nfse:NumeroNfse>?</nfse:NumeroNfse>
            <!--Optional:-->
            <nfse:PeriodoEmissao>
               <nfse:DataInicial>?</nfse:DataInicial>
               <nfse:DataFinal>?</nfse:DataFinal>
            </nfse:PeriodoEmissao>
            <!--Optional:-->
            <nfse:PeriodoCompetencia>
               <nfse:DataInicial>?</nfse:DataInicial>
               <nfse:DataFinal>?</nfse:DataFinal>
            </nfse:PeriodoCompetencia>
            <!--Optional:-->
            <nfse:Prestador>
               <!--Optional:-->
               <nfse:CpfCnpj>
                  <!--Optional:-->
                  <nfse:Cpf>?</nfse:Cpf>
                  <!--Optional:-->
                  <nfse:Cnpj>?</nfse:Cnpj>
               </nfse:CpfCnpj>
               <!--Optional:-->
               <nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>
            </nfse:Prestador>
            <!--Optional:-->
            <nfse:Tomador>
               <!--Optional:-->
               <nfse:CpfCnpj>
                  <!--Optional:-->
                  <nfse:Cpf>?</nfse:Cpf>
                  <!--Optional:-->
                  <nfse:Cnpj>?</nfse:Cnpj>
               </nfse:CpfCnpj>
               <!--Optional:-->
               <nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>
            </nfse:Tomador>
            <!--Optional:-->
            <nfse:Intermediario>
               <!--Optional:-->
               <nfse:CpfCnpj>
                  <!--Optional:-->
                  <nfse:Cpf>?</nfse:Cpf>
                  <!--Optional:-->
                  <nfse:Cnpj>?</nfse:Cnpj>
               </nfse:CpfCnpj>
               <!--Optional:-->
               <nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>
            </nfse:Intermediario>
            <nfse:Pagina>?</nfse:Pagina>
         </nfse:ConsultarNfseServicoTomadoEnvio>
         <!--Optional:-->
         <username>?</username>
         <!--Optional:-->
         <password>?</password>
      </ws:consultarNfseServicoTomado>
   </soapenv:Body>
</soapenv:Envelope>
         */
    }
    
    public function gerarNfse()
    {
        /*
         * <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ws="http://ws.issweb.fiorilli.com.br/" xmlns:nfse="http://www.abrasf.org.br/nfse.xsd" xmlns:xd="http://www.w3.org/2000/09/xmldsig#">
   <soapenv:Header/>
   <soapenv:Body>
      <ws:gerarNfse>
         <!--Optional:-->
         <nfse:GerarNfseEnvio>
            <nfse:Rps>
               <nfse:InfDeclaracaoPrestacaoServico Id="?">
                  <!--Optional:-->
                  <nfse:Rps Id="?">
                     <nfse:IdentificacaoRps>
                        <nfse:Numero>?</nfse:Numero>
                        <nfse:Serie>?</nfse:Serie>
                        <nfse:Tipo>?</nfse:Tipo>
                     </nfse:IdentificacaoRps>
                     <nfse:DataEmissao>?</nfse:DataEmissao>
                     <nfse:Status>?</nfse:Status>
                     <!--Optional:-->
                     <nfse:RpsSubstituido>
                        <nfse:Numero>?</nfse:Numero>
                        <nfse:Serie>?</nfse:Serie>
                        <nfse:Tipo>?</nfse:Tipo>
                     </nfse:RpsSubstituido>
                  </nfse:Rps>
                  <nfse:Competencia>?</nfse:Competencia>
                  <nfse:Servico>
                     <nfse:Valores>
                        <nfse:ValorServicos>?</nfse:ValorServicos>
                        <!--Optional:-->
                        <nfse:ValorDeducoes>?</nfse:ValorDeducoes>
                        <!--Optional:-->
                        <nfse:ValorPis>?</nfse:ValorPis>
                        <!--Optional:-->
                        <nfse:ValorCofins>?</nfse:ValorCofins>
                        <!--Optional:-->
                        <nfse:ValorInss>?</nfse:ValorInss>
                        <!--Optional:-->
                        <nfse:ValorIr>?</nfse:ValorIr>
                        <!--Optional:-->
                        <nfse:ValorCsll>?</nfse:ValorCsll>
                        <!--Optional:-->
                        <nfse:OutrasRetencoes>?</nfse:OutrasRetencoes>
                        <!--Optional:-->
                        <nfse:ValorIss>?</nfse:ValorIss>
                        <!--Optional:-->
                        <nfse:Aliquota>?</nfse:Aliquota>
                        <!--Optional:-->
                        <nfse:DescontoIncondicionado>?</nfse:DescontoIncondicionado>
                        <!--Optional:-->
                        <nfse:DescontoCondicionado>?</nfse:DescontoCondicionado>
                     </nfse:Valores>
                     <nfse:IssRetido>?</nfse:IssRetido>
                     <!--Optional:-->
                     <nfse:ResponsavelRetencao>?</nfse:ResponsavelRetencao>
                     <nfse:ItemListaServico>?</nfse:ItemListaServico>
                     <!--Optional:-->
                     <nfse:CodigoCnae>?</nfse:CodigoCnae>
                     <!--Optional:-->
                     <nfse:CodigoTributacaoMunicipio>?</nfse:CodigoTributacaoMunicipio>
                     <nfse:Discriminacao>?</nfse:Discriminacao>
                     <nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>
                     <!--Optional:-->
                     <nfse:CodigoPais>?</nfse:CodigoPais>
                     <nfse:ExigibilidadeISS>?</nfse:ExigibilidadeISS>
                     <!--Optional:-->
                     <nfse:MunicipioIncidencia>?</nfse:MunicipioIncidencia>
                     <!--Optional:-->
                     <nfse:NumeroProcesso>?</nfse:NumeroProcesso>
                  </nfse:Servico>
                  <nfse:Prestador>
                     <!--Optional:-->
                     <nfse:CpfCnpj>
                        <!--Optional:-->
                        <nfse:Cpf>?</nfse:Cpf>
                        <!--Optional:-->
                        <nfse:Cnpj>?</nfse:Cnpj>
                     </nfse:CpfCnpj>
                     <!--Optional:-->
                     <nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>
                  </nfse:Prestador>
                  <!--Optional:-->
                  <nfse:Tomador>
                     <!--Optional:-->
                     <nfse:IdentificacaoTomador>
                        <!--Optional:-->
                        <nfse:CpfCnpj>
                           <!--Optional:-->
                           <nfse:Cpf>?</nfse:Cpf>
                           <!--Optional:-->
                           <nfse:Cnpj>?</nfse:Cnpj>
                        </nfse:CpfCnpj>
                        <!--Optional:-->
                        <nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>
                     </nfse:IdentificacaoTomador>
                     <!--Optional:-->
                     <nfse:RazaoSocial>?</nfse:RazaoSocial>
                     <!--Optional:-->
                     <nfse:Endereco>
                        <!--Optional:-->
                        <nfse:Endereco>?</nfse:Endereco>
                        <!--Optional:-->
                        <nfse:Numero>?</nfse:Numero>
                        <!--Optional:-->
                        <nfse:Complemento>?</nfse:Complemento>
                        <!--Optional:-->
                        <nfse:Bairro>?</nfse:Bairro>
                        <!--Optional:-->
                        <nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>
                        <!--Optional:-->
                        <nfse:Uf>?</nfse:Uf>
                        <!--Optional:-->
                        <nfse:CodigoPais>?</nfse:CodigoPais>
                        <!--Optional:-->
                        <nfse:Cep>?</nfse:Cep>
                     </nfse:Endereco>
                     <!--Optional:-->
                     <nfse:Contato>
                        <!--Optional:-->
                        <nfse:Telefone>?</nfse:Telefone>
                        <!--Optional:-->
                        <nfse:Email>?</nfse:Email>
                     </nfse:Contato>
                  </nfse:Tomador>
                  <!--Optional:-->
                  <nfse:Intermediario>
                     <nfse:IdentificacaoIntermediario>
                        <!--Optional:-->
                        <nfse:CpfCnpj>
                           <!--Optional:-->
                           <nfse:Cpf>?</nfse:Cpf>
                           <!--Optional:-->
                           <nfse:Cnpj>?</nfse:Cnpj>
                        </nfse:CpfCnpj>
                        <!--Optional:-->
                        <nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>
                     </nfse:IdentificacaoIntermediario>
                     <nfse:RazaoSocial>?</nfse:RazaoSocial>
                  </nfse:Intermediario>
                  <!--Optional:-->
                  <nfse:ConstrucaoCivil>
                     <!--Optional:-->
                     <nfse:CodigoObra>?</nfse:CodigoObra>
                     <nfse:Art>?</nfse:Art>
                  </nfse:ConstrucaoCivil>
                  <!--Optional:-->
                  <nfse:RegimeEspecialTributacao>?</nfse:RegimeEspecialTributacao>
                  <nfse:OptanteSimplesNacional>?</nfse:OptanteSimplesNacional>
                  <nfse:IncentivoFiscal>?</nfse:IncentivoFiscal>
               </nfse:InfDeclaracaoPrestacaoServico>
               <!--Optional:-->
               <xd:Signature Id="?">
                  <xd:SignedInfo Id="?">
                     <xd:CanonicalizationMethod Algorithm="?">
                        e
                        <!--You may enter ANY elements at this point-->
                        gero
                     </xd:CanonicalizationMethod>
                     <xd:SignatureMethod Algorithm="?">
                        cum
                        <!--You have a CHOICE of the next 2 items at this level-->
                        <xd:HMACOutputLength>?</xd:HMACOutputLength>
                        <!--You may enter ANY elements at this point-->
                        sonoras
                     </xd:SignatureMethod>
                     <!--1 or more repetitions:-->
                     <xd:Reference Id="?" URI="?" Type="?">
                        <!--Optional:-->
                        <xd:Transforms>
                           <!--1 or more repetitions:-->
                           <xd:Transform Algorithm="?">
                              aeoliam
                              <!--You have a CHOICE of the next 2 items at this level-->
                              <xd:XPath>?</xd:XPath>
                              <!--You may enter ANY elements at this point-->
                              quae
                           </xd:Transform>
                        </xd:Transforms>
                        <xd:DigestMethod Algorithm="?">
                           ventos
                           <!--You may enter ANY elements at this point-->
                           verrantque
                        </xd:DigestMethod>
                        <xd:DigestValue>cid:939961732307</xd:DigestValue>
                     </xd:Reference>
                  </xd:SignedInfo>
                  <xd:SignatureValue Id="?">cid:147415278463</xd:SignatureValue>
                  <!--Optional:-->
                  <xd:KeyInfo Id="?">
                     temperat
                     <!--You have a CHOICE of the next 8 items at this level-->
                     <xd:KeyValue>
                        per
                        <!--You have a CHOICE of the next 3 items at this level-->
                        <xd:RSAKeyValue>
                           <xd:Modulus>cid:739911340531</xd:Modulus>
                           <xd:Exponent>cid:309103284847</xd:Exponent>
                        </xd:RSAKeyValue>
                        <xd:DSAKeyValue>
                           <!--Optional:-->
                           <xd:P>cid:895414123516</xd:P>
                           <!--Optional:-->
                           <xd:Q>cid:1528817112201</xd:Q>
                           <!--Optional:-->
                           <xd:G>cid:299762637747</xd:G>
                           <xd:Y>cid:1502874764737</xd:Y>
                           <!--Optional:-->
                           <xd:J>cid:1047045891740</xd:J>
                           <!--Optional:-->
                           <xd:Seed>cid:1545899363983</xd:Seed>
                           <!--Optional:-->
                           <xd:PgenCounter>cid:1000988662935</xd:PgenCounter>
                        </xd:DSAKeyValue>
                        <!--You may enter ANY elements at this point-->
                        turbine
                     </xd:KeyValue>
                     <xd:MgmtData>?</xd:MgmtData>
                     <xd:SPKIData>
                        <!--You have a CHOICE of the next 2 items at this level-->
                        <xd:SPKISexp>cid:1366772681362</xd:SPKISexp>
                        <!--You may enter ANY elements at this point-->
                     </xd:SPKIData>
                     <xd:RetrievalMethod URI="?" Type="?">
                        <!--Optional:-->
                        <xd:Transforms>
                           <!--1 or more repetitions:-->
                           <xd:Transform Algorithm="?">
                              circum
                              <!--You have a CHOICE of the next 2 items at this level-->
                              <xd:XPath>?</xd:XPath>
                              <!--You may enter ANY elements at this point-->
                              regemque
                           </xd:Transform>
                        </xd:Transforms>
                     </xd:RetrievalMethod>
                     <xd:X509Data>
                        <!--You have a CHOICE of the next 6 items at this level-->
                        <xd:X509IssuerSerial>
                           <xd:X509IssuerName>?</xd:X509IssuerName>
                           <xd:X509SerialNumber>?</xd:X509SerialNumber>
                        </xd:X509IssuerSerial>
                        <xd:X509CRL>cid:1070280839930</xd:X509CRL>
                        <xd:X509SKI>cid:1506884714612</xd:X509SKI>
                        <xd:X509Certificate>cid:613960607326</xd:X509Certificate>
                        <xd:X509SubjectName>?</xd:X509SubjectName>
                        <!--You may enter ANY elements at this point-->
                     </xd:X509Data>
                     <xd:KeyName>?</xd:KeyName>
                     <xd:PGPData>
                        <!--You have a CHOICE of the next 3 items at this level-->
                        <xd:PGPKeyID>cid:750635263742</xd:PGPKeyID>
                        <xd:PGPKeyPacket>cid:1202296121280</xd:PGPKeyPacket>
                        <!--You may enter ANY elements at this point-->
                     </xd:PGPData>
                     <!--You may enter ANY elements at this point-->
                     nimborum
                  </xd:KeyInfo>
                  <!--Zero or more repetitions:-->
                  <xd:Object Id="?" MimeType="?" Encoding="?">
                     fremunt
                     <!--You may enter ANY elements at this point-->
                     foedere
                  </xd:Object>
               </xd:Signature>
            </nfse:Rps>
         </nfse:GerarNfseEnvio>
         <!--Optional:-->
         <username>?</username>
         <!--Optional:-->
         <password>?</password>
      </ws:gerarNfse>
   </soapenv:Body>
</soapenv:Envelope>
         */
        
    }
    
    public function recepcionarLoteRps()
    {
        /*
         * <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ws="http://ws.issweb.fiorilli.com.br/" xmlns:nfse="http://www.abrasf.org.br/nfse.xsd" xmlns:xd="http://www.w3.org/2000/09/xmldsig#">
   <soapenv:Header/>
   <soapenv:Body>
      <ws:recepcionarLoteRps>
         <!--Optional:-->
         <nfse:EnviarLoteRpsEnvio>
            <nfse:LoteRps Id="?" versao="?">
               <nfse:NumeroLote>?</nfse:NumeroLote>
               <nfse:CpfCnpj>
                  <!--Optional:-->
                  <nfse:Cpf>?</nfse:Cpf>
                  <!--Optional:-->
                  <nfse:Cnpj>?</nfse:Cnpj>
               </nfse:CpfCnpj>
               <!--Optional:-->
               <nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>
               <nfse:QuantidadeRps>?</nfse:QuantidadeRps>
               <nfse:ListaRps>
                  <!--1 or more repetitions:-->
                  <nfse:Rps>
                     <nfse:InfDeclaracaoPrestacaoServico Id="?">
                        <!--Optional:-->
                        <nfse:Rps Id="?">
                           <nfse:IdentificacaoRps>
                              <nfse:Numero>?</nfse:Numero>
                              <nfse:Serie>?</nfse:Serie>
                              <nfse:Tipo>?</nfse:Tipo>
                           </nfse:IdentificacaoRps>
                           <nfse:DataEmissao>?</nfse:DataEmissao>
                           <nfse:Status>?</nfse:Status>
                           <!--Optional:-->
                           <nfse:RpsSubstituido>
                              <nfse:Numero>?</nfse:Numero>
                              <nfse:Serie>?</nfse:Serie>
                              <nfse:Tipo>?</nfse:Tipo>
                           </nfse:RpsSubstituido>
                        </nfse:Rps>
                        <nfse:Competencia>?</nfse:Competencia>
                        <nfse:Servico>
                           <nfse:Valores>
                              <nfse:ValorServicos>?</nfse:ValorServicos>
                              <!--Optional:-->
                              <nfse:ValorDeducoes>?</nfse:ValorDeducoes>
                              <!--Optional:-->
                              <nfse:ValorPis>?</nfse:ValorPis>
                              <!--Optional:-->
                              <nfse:ValorCofins>?</nfse:ValorCofins>
                              <!--Optional:-->
                              <nfse:ValorInss>?</nfse:ValorInss>
                              <!--Optional:-->
                              <nfse:ValorIr>?</nfse:ValorIr>
                              <!--Optional:-->
                              <nfse:ValorCsll>?</nfse:ValorCsll>
                              <!--Optional:-->
                              <nfse:OutrasRetencoes>?</nfse:OutrasRetencoes>
                              <!--Optional:-->
                              <nfse:ValorIss>?</nfse:ValorIss>
                              <!--Optional:-->
                              <nfse:Aliquota>?</nfse:Aliquota>
                              <!--Optional:-->
                              <nfse:DescontoIncondicionado>?</nfse:DescontoIncondicionado>
                              <!--Optional:-->
                              <nfse:DescontoCondicionado>?</nfse:DescontoCondicionado>
                           </nfse:Valores>
                           <nfse:IssRetido>?</nfse:IssRetido>
                           <!--Optional:-->
                           <nfse:ResponsavelRetencao>?</nfse:ResponsavelRetencao>
                           <nfse:ItemListaServico>?</nfse:ItemListaServico>
                           <!--Optional:-->
                           <nfse:CodigoCnae>?</nfse:CodigoCnae>
                           <!--Optional:-->
                           <nfse:CodigoTributacaoMunicipio>?</nfse:CodigoTributacaoMunicipio>
                           <nfse:Discriminacao>?</nfse:Discriminacao>
                           <nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>
                           <!--Optional:-->
                           <nfse:CodigoPais>?</nfse:CodigoPais>
                           <nfse:ExigibilidadeISS>?</nfse:ExigibilidadeISS>
                           <!--Optional:-->
                           <nfse:MunicipioIncidencia>?</nfse:MunicipioIncidencia>
                           <!--Optional:-->
                           <nfse:NumeroProcesso>?</nfse:NumeroProcesso>
                        </nfse:Servico>
                        <nfse:Prestador>
                           <!--Optional:-->
                           <nfse:CpfCnpj>
                              <!--Optional:-->
                              <nfse:Cpf>?</nfse:Cpf>
                              <!--Optional:-->
                              <nfse:Cnpj>?</nfse:Cnpj>
                           </nfse:CpfCnpj>
                           <!--Optional:-->
                           <nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>
                        </nfse:Prestador>
                        <!--Optional:-->
                        <nfse:Tomador>
                           <!--Optional:-->
                           <nfse:IdentificacaoTomador>
                              <!--Optional:-->
                              <nfse:CpfCnpj>
                                 <!--Optional:-->
                                 <nfse:Cpf>?</nfse:Cpf>
                                 <!--Optional:-->
                                 <nfse:Cnpj>?</nfse:Cnpj>
                              </nfse:CpfCnpj>
                              <!--Optional:-->
                              <nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>
                           </nfse:IdentificacaoTomador>
                           <!--Optional:-->
                           <nfse:RazaoSocial>?</nfse:RazaoSocial>
                           <!--Optional:-->
                           <nfse:Endereco>
                              <!--Optional:-->
                              <nfse:Endereco>?</nfse:Endereco>
                              <!--Optional:-->
                              <nfse:Numero>?</nfse:Numero>
                              <!--Optional:-->
                              <nfse:Complemento>?</nfse:Complemento>
                              <!--Optional:-->
                              <nfse:Bairro>?</nfse:Bairro>
                              <!--Optional:-->
                              <nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>
                              <!--Optional:-->
                              <nfse:Uf>?</nfse:Uf>
                              <!--Optional:-->
                              <nfse:CodigoPais>?</nfse:CodigoPais>
                              <!--Optional:-->
                              <nfse:Cep>?</nfse:Cep>
                           </nfse:Endereco>
                           <!--Optional:-->
                           <nfse:Contato>
                              <!--Optional:-->
                              <nfse:Telefone>?</nfse:Telefone>
                              <!--Optional:-->
                              <nfse:Email>?</nfse:Email>
                           </nfse:Contato>
                        </nfse:Tomador>
                        <!--Optional:-->
                        <nfse:Intermediario>
                           <nfse:IdentificacaoIntermediario>
                              <!--Optional:-->
                              <nfse:CpfCnpj>
                                 <!--Optional:-->
                                 <nfse:Cpf>?</nfse:Cpf>
                                 <!--Optional:-->
                                 <nfse:Cnpj>?</nfse:Cnpj>
                              </nfse:CpfCnpj>
                              <!--Optional:-->
                              <nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>
                           </nfse:IdentificacaoIntermediario>
                           <nfse:RazaoSocial>?</nfse:RazaoSocial>
                        </nfse:Intermediario>
                        <!--Optional:-->
                        <nfse:ConstrucaoCivil>
                           <!--Optional:-->
                           <nfse:CodigoObra>?</nfse:CodigoObra>
                           <nfse:Art>?</nfse:Art>
                        </nfse:ConstrucaoCivil>
                        <!--Optional:-->
                        <nfse:RegimeEspecialTributacao>?</nfse:RegimeEspecialTributacao>
                        <nfse:OptanteSimplesNacional>?</nfse:OptanteSimplesNacional>
                        <nfse:IncentivoFiscal>?</nfse:IncentivoFiscal>
                     </nfse:InfDeclaracaoPrestacaoServico>
                     <!--Optional:-->
                     <xd:Signature Id="?">
                        <xd:SignedInfo Id="?">
                           <xd:CanonicalizationMethod Algorithm="?">
                              e
                              <!--You may enter ANY elements at this point-->
                              gero
                           </xd:CanonicalizationMethod>
                           <xd:SignatureMethod Algorithm="?">
                              cum
                              <!--You have a CHOICE of the next 2 items at this level-->
                              <xd:HMACOutputLength>?</xd:HMACOutputLength>
                              <!--You may enter ANY elements at this point-->
                              sonoras
                           </xd:SignatureMethod>
                           <!--1 or more repetitions:-->
                           <xd:Reference Id="?" URI="?" Type="?">
                              <!--Optional:-->
                              <xd:Transforms>
                                 <!--1 or more repetitions:-->
                                 <xd:Transform Algorithm="?">
                                    aeoliam
                                    <!--You have a CHOICE of the next 2 items at this level-->
                                    <xd:XPath>?</xd:XPath>
                                    <!--You may enter ANY elements at this point-->
                                    quae
                                 </xd:Transform>
                              </xd:Transforms>
                              <xd:DigestMethod Algorithm="?">
                                 ventos
                                 <!--You may enter ANY elements at this point-->
                                 verrantque
                              </xd:DigestMethod>
                              <xd:DigestValue>cid:557720563845</xd:DigestValue>
                           </xd:Reference>
                        </xd:SignedInfo>
                        <xd:SignatureValue Id="?">cid:1468549732454</xd:SignatureValue>
                        <!--Optional:-->
                        <xd:KeyInfo Id="?">
                           temperat
                           <!--You have a CHOICE of the next 8 items at this level-->
                           <xd:KeyValue>
                              per
                              <!--You have a CHOICE of the next 3 items at this level-->
                              <xd:RSAKeyValue>
                                 <xd:Modulus>cid:559459185051</xd:Modulus>
                                 <xd:Exponent>cid:1505047197412</xd:Exponent>
                              </xd:RSAKeyValue>
                              <xd:DSAKeyValue>
                                 <!--Optional:-->
                                 <xd:P>cid:19051424602</xd:P>
                                 <!--Optional:-->
                                 <xd:Q>cid:1023928820341</xd:Q>
                                 <!--Optional:-->
                                 <xd:G>cid:339039929926</xd:G>
                                 <xd:Y>cid:515117391777</xd:Y>
                                 <!--Optional:-->
                                 <xd:J>cid:1050926243795</xd:J>
                                 <!--Optional:-->
                                 <xd:Seed>cid:1186754432900</xd:Seed>
                                 <!--Optional:-->
                                 <xd:PgenCounter>cid:760390090226</xd:PgenCounter>
                              </xd:DSAKeyValue>
                              <!--You may enter ANY elements at this point-->
                              turbine
                           </xd:KeyValue>
                           <xd:MgmtData>?</xd:MgmtData>
                           <xd:SPKIData>
                              <!--You have a CHOICE of the next 2 items at this level-->
                              <xd:SPKISexp>cid:873171302455</xd:SPKISexp>
                              <!--You may enter ANY elements at this point-->
                           </xd:SPKIData>
                           <xd:RetrievalMethod URI="?" Type="?">
                              <!--Optional:-->
                              <xd:Transforms>
                                 <!--1 or more repetitions:-->
                                 <xd:Transform Algorithm="?">
                                    circum
                                    <!--You have a CHOICE of the next 2 items at this level-->
                                    <xd:XPath>?</xd:XPath>
                                    <!--You may enter ANY elements at this point-->
                                    regemque
                                 </xd:Transform>
                              </xd:Transforms>
                           </xd:RetrievalMethod>
                           <xd:X509Data>
                              <!--You have a CHOICE of the next 6 items at this level-->
                              <xd:X509IssuerSerial>
                                 <xd:X509IssuerName>?</xd:X509IssuerName>
                                 <xd:X509SerialNumber>?</xd:X509SerialNumber>
                              </xd:X509IssuerSerial>
                              <xd:X509CRL>cid:10243210946</xd:X509CRL>
                              <xd:X509SKI>cid:1023064846656</xd:X509SKI>
                              <xd:X509Certificate>cid:573111608114</xd:X509Certificate>
                              <xd:X509SubjectName>?</xd:X509SubjectName>
                              <!--You may enter ANY elements at this point-->
                           </xd:X509Data>
                           <xd:KeyName>?</xd:KeyName>
                           <xd:PGPData>
                              <!--You have a CHOICE of the next 3 items at this level-->
                              <xd:PGPKeyID>cid:994331846069</xd:PGPKeyID>
                              <xd:PGPKeyPacket>cid:1463049487026</xd:PGPKeyPacket>
                              <!--You may enter ANY elements at this point-->
                           </xd:PGPData>
                           <!--You may enter ANY elements at this point-->
                           nimborum
                        </xd:KeyInfo>
                        <!--Zero or more repetitions:-->
                        <xd:Object Id="?" MimeType="?" Encoding="?">
                           fremunt
                           <!--You may enter ANY elements at this point-->
                           foedere
                        </xd:Object>
                     </xd:Signature>
                  </nfse:Rps>
               </nfse:ListaRps>
            </nfse:LoteRps>
            <!--Optional:-->
            <nfse:Signature Id="?">
               <xd:SignedInfo Id="?">
                  <xd:CanonicalizationMethod Algorithm="?">
                     ferant
                     <!--You may enter ANY elements at this point-->
                     profundum
                  </xd:CanonicalizationMethod>
                  <xd:SignatureMethod Algorithm="?">
                     sceptra
                     <!--You have a CHOICE of the next 2 items at this level-->
                     <xd:HMACOutputLength>?</xd:HMACOutputLength>
                     <!--You may enter ANY elements at this point-->
                     et
                  </xd:SignatureMethod>
                  <!--1 or more repetitions:-->
                  <xd:Reference Id="?" URI="?" Type="?">
                     <!--Optional:-->
                     <xd:Transforms>
                        <!--1 or more repetitions:-->
                        <xd:Transform Algorithm="?">
                           turbine
                           <!--You have a CHOICE of the next 2 items at this level-->
                           <xd:XPath>?</xd:XPath>
                           <!--You may enter ANY elements at this point-->
                           iovis
                        </xd:Transform>
                     </xd:Transforms>
                     <xd:DigestMethod Algorithm="?">
                        flammato
                        <!--You may enter ANY elements at this point-->
                        speluncis
                     </xd:DigestMethod>
                     <xd:DigestValue>cid:903005885073</xd:DigestValue>
                  </xd:Reference>
               </xd:SignedInfo>
               <xd:SignatureValue Id="?">cid:663733684748</xd:SignatureValue>
               <!--Optional:-->
               <xd:KeyInfo Id="?">
                  profundum
                  <!--You have a CHOICE of the next 8 items at this level-->
                  <xd:KeyValue>
                     bella
                     <!--You have a CHOICE of the next 3 items at this level-->
                     <xd:RSAKeyValue>
                        <xd:Modulus>cid:1280977113016</xd:Modulus>
                        <xd:Exponent>cid:986731924819</xd:Exponent>
                     </xd:RSAKeyValue>
                     <xd:DSAKeyValue>
                        <!--Optional:-->
                        <xd:P>cid:1104429971354</xd:P>
                        <!--Optional:-->
                        <xd:Q>cid:599964134648</xd:Q>
                        <!--Optional:-->
                        <xd:G>cid:1550682786327</xd:G>
                        <xd:Y>cid:368826653070</xd:Y>
                        <!--Optional:-->
                        <xd:J>cid:549681941427</xd:J>
                        <!--Optional:-->
                        <xd:Seed>cid:1155025604157</xd:Seed>
                        <!--Optional:-->
                        <xd:PgenCounter>cid:425901016498</xd:PgenCounter>
                     </xd:DSAKeyValue>
                     <!--You may enter ANY elements at this point-->
                     nubibus
                  </xd:KeyValue>
                  <xd:MgmtData>?</xd:MgmtData>
                  <xd:SPKIData>
                     <!--You have a CHOICE of the next 2 items at this level-->
                     <xd:SPKISexp>cid:512487165332</xd:SPKISexp>
                     <!--You may enter ANY elements at this point-->
                  </xd:SPKIData>
                  <xd:RetrievalMethod URI="?" Type="?">
                     <!--Optional:-->
                     <xd:Transforms>
                        <!--1 or more repetitions:-->
                        <xd:Transform Algorithm="?">
                           flammas
                           <!--You have a CHOICE of the next 2 items at this level-->
                           <xd:XPath>?</xd:XPath>
                           <!--You may enter ANY elements at this point-->
                           ac
                        </xd:Transform>
                     </xd:Transforms>
                  </xd:RetrievalMethod>
                  <xd:X509Data>
                     <!--You have a CHOICE of the next 6 items at this level-->
                     <xd:X509IssuerSerial>
                        <xd:X509IssuerName>?</xd:X509IssuerName>
                        <xd:X509SerialNumber>?</xd:X509SerialNumber>
                     </xd:X509IssuerSerial>
                     <xd:X509CRL>cid:1246102520344</xd:X509CRL>
                     <xd:X509SKI>cid:339969720212</xd:X509SKI>
                     <xd:X509Certificate>cid:512480337840</xd:X509Certificate>
                     <xd:X509SubjectName>?</xd:X509SubjectName>
                     <!--You may enter ANY elements at this point-->
                  </xd:X509Data>
                  <xd:KeyName>?</xd:KeyName>
                  <xd:PGPData>
                     <!--You have a CHOICE of the next 3 items at this level-->
                     <xd:PGPKeyID>cid:567532709088</xd:PGPKeyID>
                     <xd:PGPKeyPacket>cid:1144939453551</xd:PGPKeyPacket>
                     <!--You may enter ANY elements at this point-->
                  </xd:PGPData>
                  <!--You may enter ANY elements at this point-->
                  hoc
               </xd:KeyInfo>
               <!--Zero or more repetitions:-->
               <xd:Object Id="?" MimeType="?" Encoding="?">
                  rapidum
                  <!--You may enter ANY elements at this point-->
                  ac
               </xd:Object>
            </nfse:Signature>
         </nfse:EnviarLoteRpsEnvio>
         <!--Optional:-->
         <username>?</username>
         <!--Optional:-->
         <password>?</password>
      </ws:recepcionarLoteRps>
   </soapenv:Body>
</soapenv:Envelope>
         */
    }
    
    public function recepcionarLoteRpsSincrono()
    {
        /*
         * <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ws="http://ws.issweb.fiorilli.com.br/" xmlns:nfse="http://www.abrasf.org.br/nfse.xsd" xmlns:xd="http://www.w3.org/2000/09/xmldsig#">
   <soapenv:Header/>
   <soapenv:Body>
      <ws:recepcionarLoteRpsSincrono>
         <!--Optional:-->
         <nfse:EnviarLoteRpsSincronoEnvio>
            <nfse:LoteRps Id="?" versao="?">
               <nfse:NumeroLote>?</nfse:NumeroLote>
               <nfse:CpfCnpj>
                  <!--Optional:-->
                  <nfse:Cpf>?</nfse:Cpf>
                  <!--Optional:-->
                  <nfse:Cnpj>?</nfse:Cnpj>
               </nfse:CpfCnpj>
               <!--Optional:-->
               <nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>
               <nfse:QuantidadeRps>?</nfse:QuantidadeRps>
               <nfse:ListaRps>
                  <!--1 or more repetitions:-->
                  <nfse:Rps>
                     <nfse:InfDeclaracaoPrestacaoServico Id="?">
                        <!--Optional:-->
                        <nfse:Rps Id="?">
                           <nfse:IdentificacaoRps>
                              <nfse:Numero>?</nfse:Numero>
                              <nfse:Serie>?</nfse:Serie>
                              <nfse:Tipo>?</nfse:Tipo>
                           </nfse:IdentificacaoRps>
                           <nfse:DataEmissao>?</nfse:DataEmissao>
                           <nfse:Status>?</nfse:Status>
                           <!--Optional:-->
                           <nfse:RpsSubstituido>
                              <nfse:Numero>?</nfse:Numero>
                              <nfse:Serie>?</nfse:Serie>
                              <nfse:Tipo>?</nfse:Tipo>
                           </nfse:RpsSubstituido>
                        </nfse:Rps>
                        <nfse:Competencia>?</nfse:Competencia>
                        <nfse:Servico>
                           <nfse:Valores>
                              <nfse:ValorServicos>?</nfse:ValorServicos>
                              <!--Optional:-->
                              <nfse:ValorDeducoes>?</nfse:ValorDeducoes>
                              <!--Optional:-->
                              <nfse:ValorPis>?</nfse:ValorPis>
                              <!--Optional:-->
                              <nfse:ValorCofins>?</nfse:ValorCofins>
                              <!--Optional:-->
                              <nfse:ValorInss>?</nfse:ValorInss>
                              <!--Optional:-->
                              <nfse:ValorIr>?</nfse:ValorIr>
                              <!--Optional:-->
                              <nfse:ValorCsll>?</nfse:ValorCsll>
                              <!--Optional:-->
                              <nfse:OutrasRetencoes>?</nfse:OutrasRetencoes>
                              <!--Optional:-->
                              <nfse:ValorIss>?</nfse:ValorIss>
                              <!--Optional:-->
                              <nfse:Aliquota>?</nfse:Aliquota>
                              <!--Optional:-->
                              <nfse:DescontoIncondicionado>?</nfse:DescontoIncondicionado>
                              <!--Optional:-->
                              <nfse:DescontoCondicionado>?</nfse:DescontoCondicionado>
                           </nfse:Valores>
                           <nfse:IssRetido>?</nfse:IssRetido>
                           <!--Optional:-->
                           <nfse:ResponsavelRetencao>?</nfse:ResponsavelRetencao>
                           <nfse:ItemListaServico>?</nfse:ItemListaServico>
                           <!--Optional:-->
                           <nfse:CodigoCnae>?</nfse:CodigoCnae>
                           <!--Optional:-->
                           <nfse:CodigoTributacaoMunicipio>?</nfse:CodigoTributacaoMunicipio>
                           <nfse:Discriminacao>?</nfse:Discriminacao>
                           <nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>
                           <!--Optional:-->
                           <nfse:CodigoPais>?</nfse:CodigoPais>
                           <nfse:ExigibilidadeISS>?</nfse:ExigibilidadeISS>
                           <!--Optional:-->
                           <nfse:MunicipioIncidencia>?</nfse:MunicipioIncidencia>
                           <!--Optional:-->
                           <nfse:NumeroProcesso>?</nfse:NumeroProcesso>
                        </nfse:Servico>
                        <nfse:Prestador>
                           <!--Optional:-->
                           <nfse:CpfCnpj>
                              <!--Optional:-->
                              <nfse:Cpf>?</nfse:Cpf>
                              <!--Optional:-->
                              <nfse:Cnpj>?</nfse:Cnpj>
                           </nfse:CpfCnpj>
                           <!--Optional:-->
                           <nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>
                        </nfse:Prestador>
                        <!--Optional:-->
                        <nfse:Tomador>
                           <!--Optional:-->
                           <nfse:IdentificacaoTomador>
                              <!--Optional:-->
                              <nfse:CpfCnpj>
                                 <!--Optional:-->
                                 <nfse:Cpf>?</nfse:Cpf>
                                 <!--Optional:-->
                                 <nfse:Cnpj>?</nfse:Cnpj>
                              </nfse:CpfCnpj>
                              <!--Optional:-->
                              <nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>
                           </nfse:IdentificacaoTomador>
                           <!--Optional:-->
                           <nfse:RazaoSocial>?</nfse:RazaoSocial>
                           <!--Optional:-->
                           <nfse:Endereco>
                              <!--Optional:-->
                              <nfse:Endereco>?</nfse:Endereco>
                              <!--Optional:-->
                              <nfse:Numero>?</nfse:Numero>
                              <!--Optional:-->
                              <nfse:Complemento>?</nfse:Complemento>
                              <!--Optional:-->
                              <nfse:Bairro>?</nfse:Bairro>
                              <!--Optional:-->
                              <nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>
                              <!--Optional:-->
                              <nfse:Uf>?</nfse:Uf>
                              <!--Optional:-->
                              <nfse:CodigoPais>?</nfse:CodigoPais>
                              <!--Optional:-->
                              <nfse:Cep>?</nfse:Cep>
                           </nfse:Endereco>
                           <!--Optional:-->
                           <nfse:Contato>
                              <!--Optional:-->
                              <nfse:Telefone>?</nfse:Telefone>
                              <!--Optional:-->
                              <nfse:Email>?</nfse:Email>
                           </nfse:Contato>
                        </nfse:Tomador>
                        <!--Optional:-->
                        <nfse:Intermediario>
                           <nfse:IdentificacaoIntermediario>
                              <!--Optional:-->
                              <nfse:CpfCnpj>
                                 <!--Optional:-->
                                 <nfse:Cpf>?</nfse:Cpf>
                                 <!--Optional:-->
                                 <nfse:Cnpj>?</nfse:Cnpj>
                              </nfse:CpfCnpj>
                              <!--Optional:-->
                              <nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>
                           </nfse:IdentificacaoIntermediario>
                           <nfse:RazaoSocial>?</nfse:RazaoSocial>
                        </nfse:Intermediario>
                        <!--Optional:-->
                        <nfse:ConstrucaoCivil>
                           <!--Optional:-->
                           <nfse:CodigoObra>?</nfse:CodigoObra>
                           <nfse:Art>?</nfse:Art>
                        </nfse:ConstrucaoCivil>
                        <!--Optional:-->
                        <nfse:RegimeEspecialTributacao>?</nfse:RegimeEspecialTributacao>
                        <nfse:OptanteSimplesNacional>?</nfse:OptanteSimplesNacional>
                        <nfse:IncentivoFiscal>?</nfse:IncentivoFiscal>
                     </nfse:InfDeclaracaoPrestacaoServico>
                     <!--Optional:-->
                     <xd:Signature Id="?">
                        <xd:SignedInfo Id="?">
                           <xd:CanonicalizationMethod Algorithm="?">
                              e
                              <!--You may enter ANY elements at this point-->
                              gero
                           </xd:CanonicalizationMethod>
                           <xd:SignatureMethod Algorithm="?">
                              cum
                              <!--You have a CHOICE of the next 2 items at this level-->
                              <xd:HMACOutputLength>?</xd:HMACOutputLength>
                              <!--You may enter ANY elements at this point-->
                              sonoras
                           </xd:SignatureMethod>
                           <!--1 or more repetitions:-->
                           <xd:Reference Id="?" URI="?" Type="?">
                              <!--Optional:-->
                              <xd:Transforms>
                                 <!--1 or more repetitions:-->
                                 <xd:Transform Algorithm="?">
                                    aeoliam
                                    <!--You have a CHOICE of the next 2 items at this level-->
                                    <xd:XPath>?</xd:XPath>
                                    <!--You may enter ANY elements at this point-->
                                    quae
                                 </xd:Transform>
                              </xd:Transforms>
                              <xd:DigestMethod Algorithm="?">
                                 ventos
                                 <!--You may enter ANY elements at this point-->
                                 verrantque
                              </xd:DigestMethod>
                              <xd:DigestValue>cid:1460074631602</xd:DigestValue>
                           </xd:Reference>
                        </xd:SignedInfo>
                        <xd:SignatureValue Id="?">cid:660488162181</xd:SignatureValue>
                        <!--Optional:-->
                        <xd:KeyInfo Id="?">
                           temperat
                           <!--You have a CHOICE of the next 8 items at this level-->
                           <xd:KeyValue>
                              per
                              <!--You have a CHOICE of the next 3 items at this level-->
                              <xd:RSAKeyValue>
                                 <xd:Modulus>cid:1452888605785</xd:Modulus>
                                 <xd:Exponent>cid:1352657055681</xd:Exponent>
                              </xd:RSAKeyValue>
                              <xd:DSAKeyValue>
                                 <!--Optional:-->
                                 <xd:P>cid:68542465238</xd:P>
                                 <!--Optional:-->
                                 <xd:Q>cid:935394555519</xd:Q>
                                 <!--Optional:-->
                                 <xd:G>cid:1261909881326</xd:G>
                                 <xd:Y>cid:1130685556806</xd:Y>
                                 <!--Optional:-->
                                 <xd:J>cid:1312307870033</xd:J>
                                 <!--Optional:-->
                                 <xd:Seed>cid:96722301691</xd:Seed>
                                 <!--Optional:-->
                                 <xd:PgenCounter>cid:1253350562676</xd:PgenCounter>
                              </xd:DSAKeyValue>
                              <!--You may enter ANY elements at this point-->
                              turbine
                           </xd:KeyValue>
                           <xd:MgmtData>?</xd:MgmtData>
                           <xd:SPKIData>
                              <!--You have a CHOICE of the next 2 items at this level-->
                              <xd:SPKISexp>cid:1007037682609</xd:SPKISexp>
                              <!--You may enter ANY elements at this point-->
                           </xd:SPKIData>
                           <xd:RetrievalMethod URI="?" Type="?">
                              <!--Optional:-->
                              <xd:Transforms>
                                 <!--1 or more repetitions:-->
                                 <xd:Transform Algorithm="?">
                                    circum
                                    <!--You have a CHOICE of the next 2 items at this level-->
                                    <xd:XPath>?</xd:XPath>
                                    <!--You may enter ANY elements at this point-->
                                    regemque
                                 </xd:Transform>
                              </xd:Transforms>
                           </xd:RetrievalMethod>
                           <xd:X509Data>
                              <!--You have a CHOICE of the next 6 items at this level-->
                              <xd:X509IssuerSerial>
                                 <xd:X509IssuerName>?</xd:X509IssuerName>
                                 <xd:X509SerialNumber>?</xd:X509SerialNumber>
                              </xd:X509IssuerSerial>
                              <xd:X509CRL>cid:604073908670</xd:X509CRL>
                              <xd:X509SKI>cid:694353443009</xd:X509SKI>
                              <xd:X509Certificate>cid:21211208286</xd:X509Certificate>
                              <xd:X509SubjectName>?</xd:X509SubjectName>
                              <!--You may enter ANY elements at this point-->
                           </xd:X509Data>
                           <xd:KeyName>?</xd:KeyName>
                           <xd:PGPData>
                              <!--You have a CHOICE of the next 3 items at this level-->
                              <xd:PGPKeyID>cid:1355357575911</xd:PGPKeyID>
                              <xd:PGPKeyPacket>cid:395868253435</xd:PGPKeyPacket>
                              <!--You may enter ANY elements at this point-->
                           </xd:PGPData>
                           <!--You may enter ANY elements at this point-->
                           nimborum
                        </xd:KeyInfo>
                        <!--Zero or more repetitions:-->
                        <xd:Object Id="?" MimeType="?" Encoding="?">
                           fremunt
                           <!--You may enter ANY elements at this point-->
                           foedere
                        </xd:Object>
                     </xd:Signature>
                  </nfse:Rps>
               </nfse:ListaRps>
            </nfse:LoteRps>
            <!--Optional:-->
            <nfse:Signature Id="?">
               <xd:SignedInfo Id="?">
                  <xd:CanonicalizationMethod Algorithm="?">
                     ferant
                     <!--You may enter ANY elements at this point-->
                     profundum
                  </xd:CanonicalizationMethod>
                  <xd:SignatureMethod Algorithm="?">
                     sceptra
                     <!--You have a CHOICE of the next 2 items at this level-->
                     <xd:HMACOutputLength>?</xd:HMACOutputLength>
                     <!--You may enter ANY elements at this point-->
                     et
                  </xd:SignatureMethod>
                  <!--1 or more repetitions:-->
                  <xd:Reference Id="?" URI="?" Type="?">
                     <!--Optional:-->
                     <xd:Transforms>
                        <!--1 or more repetitions:-->
                        <xd:Transform Algorithm="?">
                           turbine
                           <!--You have a CHOICE of the next 2 items at this level-->
                           <xd:XPath>?</xd:XPath>
                           <!--You may enter ANY elements at this point-->
                           iovis
                        </xd:Transform>
                     </xd:Transforms>
                     <xd:DigestMethod Algorithm="?">
                        flammato
                        <!--You may enter ANY elements at this point-->
                        speluncis
                     </xd:DigestMethod>
                     <xd:DigestValue>cid:1074616334129</xd:DigestValue>
                  </xd:Reference>
               </xd:SignedInfo>
               <xd:SignatureValue Id="?">cid:212553959337</xd:SignatureValue>
               <!--Optional:-->
               <xd:KeyInfo Id="?">
                  profundum
                  <!--You have a CHOICE of the next 8 items at this level-->
                  <xd:KeyValue>
                     bella
                     <!--You have a CHOICE of the next 3 items at this level-->
                     <xd:RSAKeyValue>
                        <xd:Modulus>cid:1042243429009</xd:Modulus>
                        <xd:Exponent>cid:1109307641108</xd:Exponent>
                     </xd:RSAKeyValue>
                     <xd:DSAKeyValue>
                        <!--Optional:-->
                        <xd:P>cid:500447785577</xd:P>
                        <!--Optional:-->
                        <xd:Q>cid:1238233830226</xd:Q>
                        <!--Optional:-->
                        <xd:G>cid:1581705965562</xd:G>
                        <xd:Y>cid:994125075475</xd:Y>
                        <!--Optional:-->
                        <xd:J>cid:336547307242</xd:J>
                        <!--Optional:-->
                        <xd:Seed>cid:1072337833582</xd:Seed>
                        <!--Optional:-->
                        <xd:PgenCounter>cid:321594117504</xd:PgenCounter>
                     </xd:DSAKeyValue>
                     <!--You may enter ANY elements at this point-->
                     nubibus
                  </xd:KeyValue>
                  <xd:MgmtData>?</xd:MgmtData>
                  <xd:SPKIData>
                     <!--You have a CHOICE of the next 2 items at this level-->
                     <xd:SPKISexp>cid:1427189461193</xd:SPKISexp>
                     <!--You may enter ANY elements at this point-->
                  </xd:SPKIData>
                  <xd:RetrievalMethod URI="?" Type="?">
                     <!--Optional:-->
                     <xd:Transforms>
                        <!--1 or more repetitions:-->
                        <xd:Transform Algorithm="?">
                           flammas
                           <!--You have a CHOICE of the next 2 items at this level-->
                           <xd:XPath>?</xd:XPath>
                           <!--You may enter ANY elements at this point-->
                           ac
                        </xd:Transform>
                     </xd:Transforms>
                  </xd:RetrievalMethod>
                  <xd:X509Data>
                     <!--You have a CHOICE of the next 6 items at this level-->
                     <xd:X509IssuerSerial>
                        <xd:X509IssuerName>?</xd:X509IssuerName>
                        <xd:X509SerialNumber>?</xd:X509SerialNumber>
                     </xd:X509IssuerSerial>
                     <xd:X509CRL>cid:1520501514961</xd:X509CRL>
                     <xd:X509SKI>cid:1221369176057</xd:X509SKI>
                     <xd:X509Certificate>cid:347922143353</xd:X509Certificate>
                     <xd:X509SubjectName>?</xd:X509SubjectName>
                     <!--You may enter ANY elements at this point-->
                  </xd:X509Data>
                  <xd:KeyName>?</xd:KeyName>
                  <xd:PGPData>
                     <!--You have a CHOICE of the next 3 items at this level-->
                     <xd:PGPKeyID>cid:1135410869672</xd:PGPKeyID>
                     <xd:PGPKeyPacket>cid:196762562125</xd:PGPKeyPacket>
                     <!--You may enter ANY elements at this point-->
                  </xd:PGPData>
                  <!--You may enter ANY elements at this point-->
                  hoc
               </xd:KeyInfo>
               <!--Zero or more repetitions:-->
               <xd:Object Id="?" MimeType="?" Encoding="?">
                  rapidum
                  <!--You may enter ANY elements at this point-->
                  ac
               </xd:Object>
            </nfse:Signature>
         </nfse:EnviarLoteRpsSincronoEnvio>
         <!--Optional:-->
         <username>?</username>
         <!--Optional:-->
         <password>?</password>
      </ws:recepcionarLoteRpsSincrono>
   </soapenv:Body>
</soapenv:Envelope>
         */
        
    }
    
    public function substituirNfse()
    {
        /*
         * <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ws="http://ws.issweb.fiorilli.com.br/" xmlns:nfse="http://www.abrasf.org.br/nfse.xsd" xmlns:xd="http://www.w3.org/2000/09/xmldsig#">
   <soapenv:Header/>
   <soapenv:Body>
      <ws:substituirNfse>
         <!--Optional:-->
         <nfse:SubstituirNfseEnvio>
            <nfse:SubstituicaoNfse Id="?">
               <nfse:Pedido>
                  <nfse:InfPedidoCancelamento Id="?">
                     <nfse:IdentificacaoNfse>
                        <nfse:Numero>?</nfse:Numero>
                        <nfse:CpfCnpj>
                           <!--Optional:-->
                           <nfse:Cpf>?</nfse:Cpf>
                           <!--Optional:-->
                           <nfse:Cnpj>?</nfse:Cnpj>
                        </nfse:CpfCnpj>
                        <!--Optional:-->
                        <nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>
                        <nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>
                     </nfse:IdentificacaoNfse>
                     <!--Optional:-->
                     <nfse:CodigoCancelamento>?</nfse:CodigoCancelamento>
                  </nfse:InfPedidoCancelamento>
                  <!--Optional:-->
                  <xd:Signature Id="?">
                     <xd:SignedInfo Id="?">
                        <xd:CanonicalizationMethod Algorithm="?">
                           e
                           <!--You may enter ANY elements at this point-->
                           gero
                        </xd:CanonicalizationMethod>
                        <xd:SignatureMethod Algorithm="?">
                           cum
                           <!--You have a CHOICE of the next 2 items at this level-->
                           <xd:HMACOutputLength>?</xd:HMACOutputLength>
                           <!--You may enter ANY elements at this point-->
                           sonoras
                        </xd:SignatureMethod>
                        <!--1 or more repetitions:-->
                        <xd:Reference Id="?" URI="?" Type="?">
                           <!--Optional:-->
                           <xd:Transforms>
                              <!--1 or more repetitions:-->
                              <xd:Transform Algorithm="?">
                                 aeoliam
                                 <!--You have a CHOICE of the next 2 items at this level-->
                                 <xd:XPath>?</xd:XPath>
                                 <!--You may enter ANY elements at this point-->
                                 quae
                              </xd:Transform>
                           </xd:Transforms>
                           <xd:DigestMethod Algorithm="?">
                              ventos
                              <!--You may enter ANY elements at this point-->
                              verrantque
                           </xd:DigestMethod>
                           <xd:DigestValue>cid:1194449533108</xd:DigestValue>
                        </xd:Reference>
                     </xd:SignedInfo>
                     <xd:SignatureValue Id="?">cid:547293395370</xd:SignatureValue>
                     <!--Optional:-->
                     <xd:KeyInfo Id="?">
                        temperat
                        <!--You have a CHOICE of the next 8 items at this level-->
                        <xd:KeyValue>
                           per
                           <!--You have a CHOICE of the next 3 items at this level-->
                           <xd:RSAKeyValue>
                              <xd:Modulus>cid:406779972933</xd:Modulus>
                              <xd:Exponent>cid:1156111780349</xd:Exponent>
                           </xd:RSAKeyValue>
                           <xd:DSAKeyValue>
                              <!--Optional:-->
                              <xd:P>cid:1355439074967</xd:P>
                              <!--Optional:-->
                              <xd:Q>cid:889804241249</xd:Q>
                              <!--Optional:-->
                              <xd:G>cid:820743970398</xd:G>
                              <xd:Y>cid:1082041541994</xd:Y>
                              <!--Optional:-->
                              <xd:J>cid:1197700404878</xd:J>
                              <!--Optional:-->
                              <xd:Seed>cid:589558893756</xd:Seed>
                              <!--Optional:-->
                              <xd:PgenCounter>cid:1105765830031</xd:PgenCounter>
                           </xd:DSAKeyValue>
                           <!--You may enter ANY elements at this point-->
                           turbine
                        </xd:KeyValue>
                        <xd:MgmtData>?</xd:MgmtData>
                        <xd:SPKIData>
                           <!--You have a CHOICE of the next 2 items at this level-->
                           <xd:SPKISexp>cid:694113043688</xd:SPKISexp>
                           <!--You may enter ANY elements at this point-->
                        </xd:SPKIData>
                        <xd:RetrievalMethod URI="?" Type="?">
                           <!--Optional:-->
                           <xd:Transforms>
                              <!--1 or more repetitions:-->
                              <xd:Transform Algorithm="?">
                                 circum
                                 <!--You have a CHOICE of the next 2 items at this level-->
                                 <xd:XPath>?</xd:XPath>
                                 <!--You may enter ANY elements at this point-->
                                 regemque
                              </xd:Transform>
                           </xd:Transforms>
                        </xd:RetrievalMethod>
                        <xd:X509Data>
                           <!--You have a CHOICE of the next 6 items at this level-->
                           <xd:X509IssuerSerial>
                              <xd:X509IssuerName>?</xd:X509IssuerName>
                              <xd:X509SerialNumber>?</xd:X509SerialNumber>
                           </xd:X509IssuerSerial>
                           <xd:X509CRL>cid:1231046889615</xd:X509CRL>
                           <xd:X509SKI>cid:849005541823</xd:X509SKI>
                           <xd:X509Certificate>cid:1487450518372</xd:X509Certificate>
                           <xd:X509SubjectName>?</xd:X509SubjectName>
                           <!--You may enter ANY elements at this point-->
                        </xd:X509Data>
                        <xd:KeyName>?</xd:KeyName>
                        <xd:PGPData>
                           <!--You have a CHOICE of the next 3 items at this level-->
                           <xd:PGPKeyID>cid:1250240955766</xd:PGPKeyID>
                           <xd:PGPKeyPacket>cid:394829110686</xd:PGPKeyPacket>
                           <!--You may enter ANY elements at this point-->
                        </xd:PGPData>
                        <!--You may enter ANY elements at this point-->
                        nimborum
                     </xd:KeyInfo>
                     <!--Zero or more repetitions:-->
                     <xd:Object Id="?" MimeType="?" Encoding="?">
                        fremunt
                        <!--You may enter ANY elements at this point-->
                        foedere
                     </xd:Object>
                  </xd:Signature>
               </nfse:Pedido>
               <nfse:Rps>
                  <nfse:InfDeclaracaoPrestacaoServico Id="?">
                     <!--Optional:-->
                     <nfse:Rps Id="?">
                        <nfse:IdentificacaoRps>
                           <nfse:Numero>?</nfse:Numero>
                           <nfse:Serie>?</nfse:Serie>
                           <nfse:Tipo>?</nfse:Tipo>
                        </nfse:IdentificacaoRps>
                        <nfse:DataEmissao>?</nfse:DataEmissao>
                        <nfse:Status>?</nfse:Status>
                        <!--Optional:-->
                        <nfse:RpsSubstituido>
                           <nfse:Numero>?</nfse:Numero>
                           <nfse:Serie>?</nfse:Serie>
                           <nfse:Tipo>?</nfse:Tipo>
                        </nfse:RpsSubstituido>
                     </nfse:Rps>
                     <nfse:Competencia>?</nfse:Competencia>
                     <nfse:Servico>
                        <nfse:Valores>
                           <nfse:ValorServicos>?</nfse:ValorServicos>
                           <!--Optional:-->
                           <nfse:ValorDeducoes>?</nfse:ValorDeducoes>
                           <!--Optional:-->
                           <nfse:ValorPis>?</nfse:ValorPis>
                           <!--Optional:-->
                           <nfse:ValorCofins>?</nfse:ValorCofins>
                           <!--Optional:-->
                           <nfse:ValorInss>?</nfse:ValorInss>
                           <!--Optional:-->
                           <nfse:ValorIr>?</nfse:ValorIr>
                           <!--Optional:-->
                           <nfse:ValorCsll>?</nfse:ValorCsll>
                           <!--Optional:-->
                           <nfse:OutrasRetencoes>?</nfse:OutrasRetencoes>
                           <!--Optional:-->
                           <nfse:ValorIss>?</nfse:ValorIss>
                           <!--Optional:-->
                           <nfse:Aliquota>?</nfse:Aliquota>
                           <!--Optional:-->
                           <nfse:DescontoIncondicionado>?</nfse:DescontoIncondicionado>
                           <!--Optional:-->
                           <nfse:DescontoCondicionado>?</nfse:DescontoCondicionado>
                        </nfse:Valores>
                        <nfse:IssRetido>?</nfse:IssRetido>
                        <!--Optional:-->
                        <nfse:ResponsavelRetencao>?</nfse:ResponsavelRetencao>
                        <nfse:ItemListaServico>?</nfse:ItemListaServico>
                        <!--Optional:-->
                        <nfse:CodigoCnae>?</nfse:CodigoCnae>
                        <!--Optional:-->
                        <nfse:CodigoTributacaoMunicipio>?</nfse:CodigoTributacaoMunicipio>
                        <nfse:Discriminacao>?</nfse:Discriminacao>
                        <nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>
                        <!--Optional:-->
                        <nfse:CodigoPais>?</nfse:CodigoPais>
                        <nfse:ExigibilidadeISS>?</nfse:ExigibilidadeISS>
                        <!--Optional:-->
                        <nfse:MunicipioIncidencia>?</nfse:MunicipioIncidencia>
                        <!--Optional:-->
                        <nfse:NumeroProcesso>?</nfse:NumeroProcesso>
                     </nfse:Servico>
                     <nfse:Prestador>
                        <!--Optional:-->
                        <nfse:CpfCnpj>
                           <!--Optional:-->
                           <nfse:Cpf>?</nfse:Cpf>
                           <!--Optional:-->
                           <nfse:Cnpj>?</nfse:Cnpj>
                        </nfse:CpfCnpj>
                        <!--Optional:-->
                        <nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>
                     </nfse:Prestador>
                     <!--Optional:-->
                     <nfse:Tomador>
                        <!--Optional:-->
                        <nfse:IdentificacaoTomador>
                           <!--Optional:-->
                           <nfse:CpfCnpj>
                              <!--Optional:-->
                              <nfse:Cpf>?</nfse:Cpf>
                              <!--Optional:-->
                              <nfse:Cnpj>?</nfse:Cnpj>
                           </nfse:CpfCnpj>
                           <!--Optional:-->
                           <nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>
                        </nfse:IdentificacaoTomador>
                        <!--Optional:-->
                        <nfse:RazaoSocial>?</nfse:RazaoSocial>
                        <!--Optional:-->
                        <nfse:Endereco>
                           <!--Optional:-->
                           <nfse:Endereco>?</nfse:Endereco>
                           <!--Optional:-->
                           <nfse:Numero>?</nfse:Numero>
                           <!--Optional:-->
                           <nfse:Complemento>?</nfse:Complemento>
                           <!--Optional:-->
                           <nfse:Bairro>?</nfse:Bairro>
                           <!--Optional:-->
                           <nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>
                           <!--Optional:-->
                           <nfse:Uf>?</nfse:Uf>
                           <!--Optional:-->
                           <nfse:CodigoPais>?</nfse:CodigoPais>
                           <!--Optional:-->
                           <nfse:Cep>?</nfse:Cep>
                        </nfse:Endereco>
                        <!--Optional:-->
                        <nfse:Contato>
                           <!--Optional:-->
                           <nfse:Telefone>?</nfse:Telefone>
                           <!--Optional:-->
                           <nfse:Email>?</nfse:Email>
                        </nfse:Contato>
                     </nfse:Tomador>
                     <!--Optional:-->
                     <nfse:Intermediario>
                        <nfse:IdentificacaoIntermediario>
                           <!--Optional:-->
                           <nfse:CpfCnpj>
                              <!--Optional:-->
                              <nfse:Cpf>?</nfse:Cpf>
                              <!--Optional:-->
                              <nfse:Cnpj>?</nfse:Cnpj>
                           </nfse:CpfCnpj>
                           <!--Optional:-->
                           <nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>
                        </nfse:IdentificacaoIntermediario>
                        <nfse:RazaoSocial>?</nfse:RazaoSocial>
                     </nfse:Intermediario>
                     <!--Optional:-->
                     <nfse:ConstrucaoCivil>
                        <!--Optional:-->
                        <nfse:CodigoObra>?</nfse:CodigoObra>
                        <nfse:Art>?</nfse:Art>
                     </nfse:ConstrucaoCivil>
                     <!--Optional:-->
                     <nfse:RegimeEspecialTributacao>?</nfse:RegimeEspecialTributacao>
                     <nfse:OptanteSimplesNacional>?</nfse:OptanteSimplesNacional>
                     <nfse:IncentivoFiscal>?</nfse:IncentivoFiscal>
                  </nfse:InfDeclaracaoPrestacaoServico>
                  <!--Optional:-->
                  <xd:Signature Id="?">
                     <xd:SignedInfo Id="?">
                        <xd:CanonicalizationMethod Algorithm="?">
                           ferant
                           <!--You may enter ANY elements at this point-->
                           profundum
                        </xd:CanonicalizationMethod>
                        <xd:SignatureMethod Algorithm="?">
                           sceptra
                           <!--You have a CHOICE of the next 2 items at this level-->
                           <xd:HMACOutputLength>?</xd:HMACOutputLength>
                           <!--You may enter ANY elements at this point-->
                           et
                        </xd:SignatureMethod>
                        <!--1 or more repetitions:-->
                        <xd:Reference Id="?" URI="?" Type="?">
                           <!--Optional:-->
                           <xd:Transforms>
                              <!--1 or more repetitions:-->
                              <xd:Transform Algorithm="?">
                                 turbine
                                 <!--You have a CHOICE of the next 2 items at this level-->
                                 <xd:XPath>?</xd:XPath>
                                 <!--You may enter ANY elements at this point-->
                                 iovis
                              </xd:Transform>
                           </xd:Transforms>
                           <xd:DigestMethod Algorithm="?">
                              flammato
                              <!--You may enter ANY elements at this point-->
                              speluncis
                           </xd:DigestMethod>
                           <xd:DigestValue>cid:293935491692</xd:DigestValue>
                        </xd:Reference>
                     </xd:SignedInfo>
                     <xd:SignatureValue Id="?">cid:842458237214</xd:SignatureValue>
                     <!--Optional:-->
                     <xd:KeyInfo Id="?">
                        profundum
                        <!--You have a CHOICE of the next 8 items at this level-->
                        <xd:KeyValue>
                           bella
                           <!--You have a CHOICE of the next 3 items at this level-->
                           <xd:RSAKeyValue>
                              <xd:Modulus>cid:868173208536</xd:Modulus>
                              <xd:Exponent>cid:176314857380</xd:Exponent>
                           </xd:RSAKeyValue>
                           <xd:DSAKeyValue>
                              <!--Optional:-->
                              <xd:P>cid:992155192305</xd:P>
                              <!--Optional:-->
                              <xd:Q>cid:1465947124143</xd:Q>
                              <!--Optional:-->
                              <xd:G>cid:1338404207717</xd:G>
                              <xd:Y>cid:523319604979</xd:Y>
                              <!--Optional:-->
                              <xd:J>cid:810760584267</xd:J>
                              <!--Optional:-->
                              <xd:Seed>cid:1569912003509</xd:Seed>
                              <!--Optional:-->
                              <xd:PgenCounter>cid:1422775161612</xd:PgenCounter>
                           </xd:DSAKeyValue>
                           <!--You may enter ANY elements at this point-->
                           nubibus
                        </xd:KeyValue>
                        <xd:MgmtData>?</xd:MgmtData>
                        <xd:SPKIData>
                           <!--You have a CHOICE of the next 2 items at this level-->
                           <xd:SPKISexp>cid:1125032903777</xd:SPKISexp>
                           <!--You may enter ANY elements at this point-->
                        </xd:SPKIData>
                        <xd:RetrievalMethod URI="?" Type="?">
                           <!--Optional:-->
                           <xd:Transforms>
                              <!--1 or more repetitions:-->
                              <xd:Transform Algorithm="?">
                                 flammas
                                 <!--You have a CHOICE of the next 2 items at this level-->
                                 <xd:XPath>?</xd:XPath>
                                 <!--You may enter ANY elements at this point-->
                                 ac
                              </xd:Transform>
                           </xd:Transforms>
                        </xd:RetrievalMethod>
                        <xd:X509Data>
                           <!--You have a CHOICE of the next 6 items at this level-->
                           <xd:X509IssuerSerial>
                              <xd:X509IssuerName>?</xd:X509IssuerName>
                              <xd:X509SerialNumber>?</xd:X509SerialNumber>
                           </xd:X509IssuerSerial>
                           <xd:X509CRL>cid:355597565428</xd:X509CRL>
                           <xd:X509SKI>cid:100695110930</xd:X509SKI>
                           <xd:X509Certificate>cid:685266412526</xd:X509Certificate>
                           <xd:X509SubjectName>?</xd:X509SubjectName>
                           <!--You may enter ANY elements at this point-->
                        </xd:X509Data>
                        <xd:KeyName>?</xd:KeyName>
                        <xd:PGPData>
                           <!--You have a CHOICE of the next 3 items at this level-->
                           <xd:PGPKeyID>cid:5974970432</xd:PGPKeyID>
                           <xd:PGPKeyPacket>cid:1576899923650</xd:PGPKeyPacket>
                           <!--You may enter ANY elements at this point-->
                        </xd:PGPData>
                        <!--You may enter ANY elements at this point-->
                        hoc
                     </xd:KeyInfo>
                     <!--Zero or more repetitions:-->
                     <xd:Object Id="?" MimeType="?" Encoding="?">
                        rapidum
                        <!--You may enter ANY elements at this point-->
                        ac
                     </xd:Object>
                  </xd:Signature>
               </nfse:Rps>
            </nfse:SubstituicaoNfse>
            <!--Optional:-->
            <nfse:Signature Id="?">
               <xd:SignedInfo Id="?">
                  <xd:CanonicalizationMethod Algorithm="?">
                     caelumque
                     <!--You may enter ANY elements at this point-->
                     speluncis
                  </xd:CanonicalizationMethod>
                  <xd:SignatureMethod Algorithm="?">
                     circum
                     <!--You have a CHOICE of the next 2 items at this level-->
                     <xd:HMACOutputLength>?</xd:HMACOutputLength>
                     <!--You may enter ANY elements at this point-->
                     aris
                  </xd:SignatureMethod>
                  <!--1 or more repetitions:-->
                  <xd:Reference Id="?" URI="?" Type="?">
                     <!--Optional:-->
                     <xd:Transforms>
                        <!--1 or more repetitions:-->
                        <xd:Transform Algorithm="?">
                           coniunx
                           <!--You have a CHOICE of the next 2 items at this level-->
                           <xd:XPath>?</xd:XPath>
                           <!--You may enter ANY elements at this point-->
                           praeterea
                        </xd:Transform>
                     </xd:Transforms>
                     <xd:DigestMethod Algorithm="?">
                        arce
                        <!--You may enter ANY elements at this point-->
                        claustra
                     </xd:DigestMethod>
                     <xd:DigestValue>cid:303755811313</xd:DigestValue>
                  </xd:Reference>
               </xd:SignedInfo>
               <xd:SignatureValue Id="?">cid:546790230334</xd:SignatureValue>
               <!--Optional:-->
               <xd:KeyInfo Id="?">
                  circum
                  <!--You have a CHOICE of the next 8 items at this level-->
                  <xd:KeyValue>
                     imperio
                     <!--You have a CHOICE of the next 3 items at this level-->
                     <xd:RSAKeyValue>
                        <xd:Modulus>cid:48394174874</xd:Modulus>
                        <xd:Exponent>cid:1144040678624</xd:Exponent>
                     </xd:RSAKeyValue>
                     <xd:DSAKeyValue>
                        <!--Optional:-->
                        <xd:P>cid:1396088250632</xd:P>
                        <!--Optional:-->
                        <xd:Q>cid:1321134845815</xd:Q>
                        <!--Optional:-->
                        <xd:G>cid:1028593842345</xd:G>
                        <xd:Y>cid:821220788235</xd:Y>
                        <!--Optional:-->
                        <xd:J>cid:628066325963</xd:J>
                        <!--Optional:-->
                        <xd:Seed>cid:1543797691801</xd:Seed>
                        <!--Optional:-->
                        <xd:PgenCounter>cid:91038256211</xd:PgenCounter>
                     </xd:DSAKeyValue>
                     <!--You may enter ANY elements at this point-->
                     certo
                  </xd:KeyValue>
                  <xd:MgmtData>?</xd:MgmtData>
                  <xd:SPKIData>
                     <!--You have a CHOICE of the next 2 items at this level-->
                     <xd:SPKISexp>cid:1108159146834</xd:SPKISexp>
                     <!--You may enter ANY elements at this point-->
                  </xd:SPKIData>
                  <xd:RetrievalMethod URI="?" Type="?">
                     <!--Optional:-->
                     <xd:Transforms>
                        <!--1 or more repetitions:-->
                        <xd:Transform Algorithm="?">
                           quisquam
                           <!--You have a CHOICE of the next 2 items at this level-->
                           <xd:XPath>?</xd:XPath>
                           <!--You may enter ANY elements at this point-->
                           et
                        </xd:Transform>
                     </xd:Transforms>
                  </xd:RetrievalMethod>
                  <xd:X509Data>
                     <!--You have a CHOICE of the next 6 items at this level-->
                     <xd:X509IssuerSerial>
                        <xd:X509IssuerName>?</xd:X509IssuerName>
                        <xd:X509SerialNumber>?</xd:X509SerialNumber>
                     </xd:X509IssuerSerial>
                     <xd:X509CRL>cid:513588379773</xd:X509CRL>
                     <xd:X509SKI>cid:1018275827067</xd:X509SKI>
                     <xd:X509Certificate>cid:1360251605524</xd:X509Certificate>
                     <xd:X509SubjectName>?</xd:X509SubjectName>
                     <!--You may enter ANY elements at this point-->
                  </xd:X509Data>
                  <xd:KeyName>?</xd:KeyName>
                  <xd:PGPData>
                     <!--You have a CHOICE of the next 3 items at this level-->
                     <xd:PGPKeyID>cid:517020601679</xd:PGPKeyID>
                     <xd:PGPKeyPacket>cid:1045377484221</xd:PGPKeyPacket>
                     <!--You may enter ANY elements at this point-->
                  </xd:PGPData>
                  <!--You may enter ANY elements at this point-->
                  ac
               </xd:KeyInfo>
               <!--Zero or more repetitions:-->
               <xd:Object Id="?" MimeType="?" Encoding="?">
                  feta
                  <!--You may enter ANY elements at this point-->
                  ac
               </xd:Object>
            </nfse:Signature>
         </nfse:SubstituirNfseEnvio>
         <!--Optional:-->
         <username>?</username>
         <!--Optional:-->
         <password>?</password>
      </ws:substituirNfse>
   </soapenv:Body>
</soapenv:Envelope>
         */
    }
}