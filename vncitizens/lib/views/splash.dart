import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:vncitizens/controllers/configuration_controller.dart';
// import 'package:vncitizens/src/controllers/authentication_controller.dart';

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

    while (configurationController.getConfiguration().isEmpty) {
      await Future.delayed(const Duration(milliseconds: 100));
    }

    // final authenticationController = Get.put(AuthenticationController());
    // authenticationController.signInWithCredential();

    Get.toNamed('/');
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Container(
          alignment: Alignment.center,
          decoration: const BoxDecoration(
            gradient: LinearGradient(
              begin: Alignment.topRight,
              end: Alignment.bottomLeft,
              stops: [0.1, 0.9],
              colors: [
                Color(0xFFFC5C7D),
                Color(0xFF6A82FB),
              ],
            ),
          ),
          padding: const EdgeInsets.symmetric(horizontal: 90.0),
          child: const Text("splash screen")),
    );
  }
}
