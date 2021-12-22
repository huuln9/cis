import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:vncitizens_home/src/controllers/configuration_controller.dart';
import 'package:vncitizens_authentication/vncitizens_authentication.dart';

class Splash extends StatefulWidget {
  const Splash({Key? key}) : super(key: key);

  @override
  _SplashState createState() => _SplashState();
}

class _SplashState extends State<Splash> {
  @override
  void initState() {
    super.initState();
    _initApp();
  }

  _initApp() async {
    final configurationController = Get.put(ConfigurationController());

    while (configurationController.configuration.isEmpty) {
      await Future.delayed(const Duration(milliseconds: 100));
    }

    final config = configurationController.configuration;
    final authenticationController = Get.put(AuthenticationController(
      ssoURL: config['ssoURL'],
      clientId: config['clientId'],
      username: config['username'],
      password: config['password'],
    ));
    authenticationController.signInWithCredential();

    Get.toNamed('/home');
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Stack(
        children: [
          Align(
            alignment: Alignment.center,
            child: SizedBox(
              width: 120,
              height: 120,
              child:
                  Image.asset("packages/vncitizens_home/assets/app_icon.png"),
            ),
          ),
          const Align(
            alignment: Alignment.bottomCenter,
            child: Padding(
              padding: EdgeInsets.only(bottom: 18.0),
              child: Text(
                "Phiên bản 1.0.0",
                style: TextStyle(
                    fontSize: 18,
                    fontWeight: FontWeight.bold,
                    color: Colors.black54),
              ),
            ),
          ),
        ],
      ),
    );
  }
}
